<?php

namespace App\Filament\Employee\Widgets;

use App\Models\OvertimeRequest;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OvertimeChart extends ChartWidget
{
    use InteractsWithPageFilters;
    protected static ?int $sort = 4;
    public function getHeading(): string | Htmlable | null
    {
        return __('menu.overtimes.chart');
    }

    protected function getData(): array
    {
        $start = $this->filters['startDate'];
        $end = $this->filters['endDate'];

        Carbon::setLocale('id');

        $data_done = Trend::query(
            OvertimeRequest::query()
                ->where('user_id', Auth::user()->id)
                ->where('overtime_status', 'Done')
            )
            ->dateColumn('request_date')
            ->between(
                start: $start ? Carbon::parse($start) : now()->startOfYear(),
                end: $end ? Carbon::parse($end) : now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        // dd($data_done);
        $data_process = Trend::query(
            OvertimeRequest::query()
                ->where('user_id', Auth::user()->id)
                ->where('overtime_status', 'Process')
            )
            ->dateColumn('request_date')
            ->between(
                start: $start ? Carbon::parse($start) : now()->startOfYear(),
                end: $end ? Carbon::parse($end) : now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => __('default.done'),
                    'data' => $data_done->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgb(75, 192, 192)',
                ],
                [
                    'label' => __('default.process'),
                    'data' => $data_process->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(255, 205, 86, 0.2)',
                    'borderColor' => 'rgb(255, 205, 86)',
                ],
            ],
            'labels' => $data_done->map(fn (TrendValue $value) => Carbon::parse($value->date)->translatedFormat('F Y')),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

<?php

namespace App\Filament\Employee\Widgets;

use App\Models\LeaveRequest;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LeaveChart extends ChartWidget
{

    use InteractsWithPageFilters;
    protected static ?int $sort = 2;

    public function getHeading(): string | Htmlable | null
    {
        return __('menu.leaves.chart');
    }

    protected function getData(): array
    {
        $start = $this->filters['startDate'];
        $end = $this->filters['endDate'];

        Carbon::setLocale('id');

        $data_approve = Trend::query(
            LeaveRequest::query()
                ->where('user_id', Auth::user()->id)
                ->where('status', 'Approved')
            )
            ->dateColumn('start_date')
            ->between(
                start: $start ? Carbon::parse($start) : now()->startOfYear(),
                end: $end ? Carbon::parse($end) : now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        $data_reject = Trend::query(
            LeaveRequest::query()
                ->where('user_id', Auth::user()->id)
                ->where('status', 'Reject')
            )
            ->dateColumn('start_date')
            ->between(
                start: $start ? Carbon::parse($start) : now()->startOfYear(),
                end: $end ? Carbon::parse($end) : now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        $data_pending = Trend::query(
            LeaveRequest::query()
                ->where('user_id', Auth::user()->id)
                ->where('status', 'Pending')
            )
            ->dateColumn('start_date')
            ->between(
                start: $start ? Carbon::parse($start) : now()->startOfYear(),
                end:$end ? Carbon::parse($end) : now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => __('default.approved'),
                    'data' => $data_approve->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgb(75, 192, 192)',
                ],
                [
                    'label' => __('default.pending'),
                    'data' => $data_pending->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(255, 205, 86, 0.2)',
                    'borderColor' => 'rgb(255, 205, 86)',
                ],
                [
                    'label' => __('default.rejected'),
                    'data' => $data_reject->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgb(255, 99, 132)',
                ],
            ],
            'labels' => $data_approve->map(fn (TrendValue $value) => Carbon::parse($value->date)->translatedFormat('F Y')),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

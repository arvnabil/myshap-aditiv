<?php

namespace App\Filament\Employee\Widgets;

use App\Models\Employee;
use App\Models\Position;
use Filament\Widgets\ChartWidget;
use Illuminate\Contracts\Support\Htmlable;

class DepartementChart extends ChartWidget
{
    protected static ?int $sort = 1;
    protected static ?string $maxHeight = '350px';

    public function getHeading(): string | Htmlable | null
    {
        $countEmployee = Employee::with('position')->count();
        return 'Departement ' . '(' . $countEmployee . ' Employee)';
    }
    protected function getData(): array
    {
        $datas = Employee::with('position')->get()->toArray();
        foreach ($datas as $data) {
            $dataCollectPosition[] = $data['position']['id'];
        }
        foreach ($dataCollectPosition as $key => $value) {
            $position = Position::with('departement')->where('id', $value)->get()->toArray();
            $positions[] = $position[0];
        }
        $dataCollectDepartement = [];
        foreach ($positions as $position) {
            $dataCollectDepartement[] = $position['departement']['name'];
        }
        $countingDepartements = array_count_values($dataCollectDepartement);
        $getArrCount = [];
        foreach ($countingDepartements as $key => $value) {
            $getArrCount[] = $value;
            $getName[] = $key;
        }
        return [
            'datasets' => [
                [
                    'label' => 'Departement',
                    'data' => $getArrCount,
                    'backgroundColor' => ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"],
                    'borderColor' => '#FFFFFF',
                ],
            ],
            'labels' => $getName,
        ];

    }

    protected function getType(): string
    {
        return 'polarArea';
    }
}

<?php

namespace App\Filament\App\Widgets;

use App\Models\ZoomSubAccount;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Illuminate\Contracts\Support\Htmlable;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class ZoomTotalAccountChart extends ChartWidget
{
    protected static ?int $sort = 3;
    protected static ?string $maxHeight = '300px';
    public function getHeading(): string | Htmlable | null
    {
        $countData = ZoomSubAccount::with('zoom_product_type')->get()->count();
        return 'Total Account (' . $countData . ')';
    }
    protected function getData(): array
    {
        $dataCollectionPro = array();
        $dataCollectionFree = array();
        $dataCollectionBusiness = array();
        $dataCollectionEducation = array();
        $dataCollectionFreeTrial = array();
        $percent_pro = 0;
        $percent_free = 0;
        $percent_business = 0;
        $percent_education = 0;
        $percent_free_trial = 0;
        $datas = ZoomSubAccount::with('zoom_product_type')->get()->toArray();
        foreach ($datas as $data) {
            if($data['zoom_product_type']['alias'] === 'Pro')
            {
                $dataCollectionPro[] = $data['zoom_product_type']['alias'];
            }
            if($data['zoom_product_type']['alias'] === 'Free')
            {
                $dataCollectionFree[] = $data['zoom_product_type']['alias'];
            }
            if($data['zoom_product_type']['alias'] === 'Business')
            {
                $dataCollectionBusiness[] = $data['zoom_product_type']['alias'];
            }
            if($data['zoom_product_type']['alias'] === 'Education')
            {
                $dataCollectionEducation[] = $data['zoom_product_type']['alias'];
            }
            if($data['zoom_product_type']['alias'] === 'Free Trial')
            {
                $dataCollectionFreeTrial[] = $data['zoom_product_type']['alias'];
            }
        }

        $dataset = [
            $countPro = count($dataCollectionPro),
            $countFree = count($dataCollectionFree),
            $countBusiness = count($dataCollectionBusiness),
            $countEducation = count($dataCollectionEducation),
            $countFreeTrial = count($dataCollectionFreeTrial),
        ];

        // Percentage
        if ($countPro || $countFree || $countBusiness || $countEducation || $countFreeTrial !== 0) {
            $percent_pro = ($countPro / array_sum($dataset)) * 100;
            $percent_free = ($countFree / array_sum($dataset)) * 100;
            $percent_business = ($countBusiness / array_sum($dataset)) * 100;
            $percent_education = ($countEducation / array_sum($dataset)) * 100;
            $percent_free_trial = ($countFreeTrial / array_sum($dataset)) * 100;
        }

        $label = [
            'Pro ' .  number_format((float)$percent_pro, 2, '.', '') . '%',
            'Free ' . number_format((float)$percent_free, 2, '.', '') . '%',
            'Business ' . number_format((float)$percent_business, 2, '.', '') . '%',
            'Education ' . number_format((float)$percent_education, 2, '.', '') . '%',
            'Free Trial ' . number_format((float)$percent_free_trial, 2, '.', '') . '%',
        ];
        return [
            'datasets' => [
                [
                    'data' => $dataset,
                    'backgroundColor' => ["#2D8CFF","#60C37D", "#FFBF39", "#CF5A36", "#938ACE"],
                    'borderColor' => '#FFFFFF',
                ],
            ],
            'labels' => $label,
        ];
    }
    protected function getOptions(): array | RawJs | null
    {
        $result = [
            'x' => [
                "min"   =>  0,
                "max"   =>  0,
            ],
            'y' => [
                "min"   =>  0,
                "max"   =>  0,
            ],
        ];
        return $result;
    }

    public function getDescription(): ?string
    {
        return 'The number of account type.';
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}

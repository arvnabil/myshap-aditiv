<?php

namespace App\Filament\App\Widgets;

use App\Models\ZoomSubAccount;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class UpcomingRenewalOverview extends BaseWidget
{
    protected static ?int $sort = 2;
    protected function getStats(): array
    {
        $startDate = Carbon::today();
        $endThreeMonths = Carbon::today()->addDays(90);
        $endTwoMonths = Carbon::today()->addDays(60);
        $endOneMonths = Carbon::today()->addDays(30);
        $dataThreeMonths = ZoomSubAccount::whereBetween('end_date', [$startDate, $endThreeMonths])->count();
        $dataTwoMonths = ZoomSubAccount::whereBetween('end_date', [$startDate, $endTwoMonths])->count();
        $dataOneMonths = ZoomSubAccount::whereBetween('end_date', [$startDate, $endOneMonths])->count();
        return [
            Stat::make('90 Days', $dataThreeMonths)
                ->description('Upcoming Renewal Accounts'),
            Stat::make('60 Days', $dataTwoMonths)
                ->description('Upcoming Renewal Accounts'),
            Stat::make('30 Days', $dataOneMonths)
                ->description('Upcoming Renewal Accounts'),
        ];
    }
}

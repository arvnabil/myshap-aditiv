<?php

namespace App\Filament\App\Resources\ZoomSubAccountResource\Pages;

use App\Filament\App\Resources\ZoomSubAccountResource;
use App\Models\ZoomSubAccount;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class ListZoomSubAccounts extends ListRecords
{
    protected static string $resource = ZoomSubAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $startDate = Carbon::today();
        $endThreeMonths = Carbon::today()->addDays(90);
        $endTwoMonths = Carbon::today()->addDays(60);
        $endOneMonths = Carbon::today()->addDays(30);
        $countThreeMonth = ZoomSubAccount::whereBetween('end_date', [$startDate, $endThreeMonths])->count();
        $countTwoMonth = ZoomSubAccount::whereBetween('end_date', [$startDate, $endTwoMonths])->count();
        $countOneMonth = ZoomSubAccount::whereBetween('end_date', [$startDate, $endOneMonths])->count();
        return [
            'all' => Tab::make(),
            'Renewal 90 Days' => Tab::make()
                ->badge($countThreeMonth)
                ->badgeColor('warning')
                ->modifyQueryUsing(fn(Builder $query) => $query->whereBetween('end_date', [$startDate, $endThreeMonths])),
            'Renewal 60 Days' => Tab::make()
                ->badge($countTwoMonth)
                ->badgeColor('warning')
                ->modifyQueryUsing(fn(Builder $query) => $query->whereBetween('end_date', [$startDate, $endTwoMonths])),
            'Renewal 30 Days' => Tab::make()
                ->badge($countOneMonth)
                ->badgeColor('warning')
                ->modifyQueryUsing(fn(Builder $query) => $query->whereBetween('end_date', [$startDate, $endOneMonths])),

        ];
    }
}

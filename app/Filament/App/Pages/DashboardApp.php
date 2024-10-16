<?php

namespace App\Filament\App\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Pages\Page;

class DashboardApp extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
        return $form->schema([
            Section::make(__('default.filter_chart'))->schema([
                DatePicker::make('startDate')
                ->label(__('default.from')),
                DatePicker::make('endDate')
                ->label(__('default.to')),
            ])->columns(2)
        ]);
    }
}

<?php

namespace App\Filament\App\Widgets;

use Filament\Widgets\Widget;

class TextMonitoringZoom extends Widget
{
    protected static ?int $sort = 1;
    protected int|string|array $columnSpan = 'full';
    protected static string $view = 'filament.app.widgets.text-monitoring-zoom';
}

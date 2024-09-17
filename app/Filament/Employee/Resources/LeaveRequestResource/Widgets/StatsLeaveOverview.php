<?php

namespace App\Filament\Employee\Resources\LeaveRequestResource\Widgets;

use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;

class StatsLeaveOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $types = LeaveType::whereIn('id', Auth::user()->leave_type)->get()->pluck('full_name', 'id')->toArray();
        $stats = [];
        $learnMore = __('default.see_detail');
        foreach ($types as $key => $value) {
            $route = route('filament.employee.resources.leave-requests.index');
            $leave =  LeaveRequest::where('user_id', auth()->user()->id)->where('status', 'Approved')->where('leave_type_id', $key)->sum('total_leave');
            $stats[] = Stat::make($value, $leave)
                ->description(new HtmlString("<a href='#'>$value</a>"))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([1, 4, 2, 3])
                ->chartColor('info')
                ->color('info');
        }
        return $stats;
    }
}

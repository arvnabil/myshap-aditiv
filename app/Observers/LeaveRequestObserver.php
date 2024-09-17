<?php

namespace App\Observers;

use App\Mail\LeaveRequest\LeaveRequestCreated;
use App\Mail\LeaveRequest\LeaveRequestApproved;
use App\Mail\LeaveRequest\LeaveRequestRejected;
use App\Models\LeaveRequest;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LeaveRequestObserver
{
    /**
     * Handle the LeaveRequest "created" event.
     */
    public function created(LeaveRequest $leaveRequest): void
    {
        Notification::make()
            ->title('Cuti '. $leaveRequest->leave_type->full_name.' Berhasil diajukan!')
            ->success()
            ->icon('heroicon-m-check-circle')
            ->body('ID:' . $leaveRequest->id . '<br/> Desc: ' . $leaveRequest->description . ' ' . $leaveRequest->total_leave . ' Hari')
            ->sendToDatabase($leaveRequest->user);

        Notification::make()
            ->title('Cuti ' . $leaveRequest->leave_type->full_name . ' diajukan oleh:' . $leaveRequest->user->employee->firstname)
            ->body('ID:' . $leaveRequest->id . '<br/> Desc: ' . $leaveRequest->description . ' ' . $leaveRequest->total_leave . ' Hari')
            ->info()
            ->icon('heroicon-m-information-circle')
            ->actions([
                Action::make('edit')
                    ->label(__('default.view_to_process'))
                    ->url(fn (): string => route('filament.administrator.resources.leave-requests.edit', ['record' => $leaveRequest]))
            ])
            ->sendToDatabase(User::role('super_admin')->get());
            if(!$leaveRequest->is_imported){
                try {
                    Mail::to(User::role('super_admin')->get())
                    ->send(new LeaveRequestCreated($leaveRequest));

                    Notification::make()
                    ->title('Sistem otomatis mengirim email ke manajemen')
                    ->icon('heroicon-m-paper-airplane')
                    ->success()
                    ->send();

                } catch (\Exception $exception) {
                    Notification::make()
                    ->title('Sistem gagal mengirim email ke manajemen')
                    ->icon('heroicon-m-x-circle')
                    ->danger()
                    ->send();

                    Log::error(
                        'Error Email Leave Request to Management: ' . $exception->getMessage(),
                        ['data' => $leaveRequest]
                    );
                }
            }else{
                Notification::make()
                    // ->title('Import Berhasil, Proses email ke semua')
                    ->title('Import Berhasil!')
                    ->icon('heroicon-m-paper-airplane')
                    ->success()
                    ->send();
            }

    }

    /**
     * Handle the LeaveRequest "updated" event.
     */
    public function updated(LeaveRequest $leaveRequest): void
    {
        if($leaveRequest->status === "Approved"){
            $successMessage = __('menu.leaves.leave')  . ' ' . $leaveRequest->leave_type->full_name . __('menu.leaves.success');
            Notification::make()
            ->title($successMessage)
            ->icon('heroicon-m-rocket-launch')
            ->body('ID:' . $leaveRequest->id . '<br/> Desc: ' . $leaveRequest->description . ' ' . $leaveRequest->total_leave . ' Hari' .'<br/> Disetujui oleh: ' . $leaveRequest->user_checked_by->employee->firstname)
            ->success()
            ->sendToDatabase($leaveRequest->user);
            Mail::to($leaveRequest->user)
            ->send(new LeaveRequestApproved($leaveRequest));
        }elseif($leaveRequest->status === "Reject") {
            $rejectMessage = __('menu.leaves.leave') . ' '  . $leaveRequest->leave_type->full_name .  __('menu.leaves.reject_by') . $leaveRequest->user_checked_by->name;
            Notification::make()
                ->title($rejectMessage)
                ->icon('heroicon-m-x-circle')
                ->danger()
                ->body('ID:' . $leaveRequest->id . '<br/> Desc: ' . $leaveRequest->description . ' ' . $leaveRequest->total_leave . ' Hari')
                ->sendToDatabase($leaveRequest->user);
            Mail::to($leaveRequest->user)
            ->send(new LeaveRequestRejected ($leaveRequest));
        }
    }

    /**
     * Handle the LeaveRequest "deleted" event.
     */
    public function deleted(LeaveRequest $leaveRequest): void
    {
        //
    }

    /**
     * Handle the LeaveRequest "restored" event.
     */
    public function restored(LeaveRequest $leaveRequest): void
    {
        //
    }

    /**
     * Handle the LeaveRequest "force deleted" event.
     */
    public function forceDeleted(LeaveRequest $leaveRequest): void
    {
        //
    }
}

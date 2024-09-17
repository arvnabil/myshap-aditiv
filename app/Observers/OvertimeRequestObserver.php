<?php

namespace App\Observers;

use App\Mail\OvertimeRequest\OvertimeRequestCreated;
use App\Mail\OvertimeRequest\OvertimeRequestDone;
use App\Models\OvertimeRequest;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OvertimeRequestObserver
{
    /**
     * Handle the OvertimeRequest "created" event.
     */
    public function created(OvertimeRequest $overtimeRequest): void
    {

        Notification::make()
            ->title('Lembur ' . $overtimeRequest->title . ' Berhasil diajukan!')
            ->success()
            ->icon('heroicon-m-check-circle')
            ->body('ID:' . $overtimeRequest->id . '<br/> Title: ' . $overtimeRequest->title )
            ->sendToDatabase($overtimeRequest->user);

        Notification::make()
            ->title('Lembur ' . $overtimeRequest->title . ' diajukan oleh:' . $overtimeRequest->user->employee->fullname)
            ->info()
            ->icon('heroicon-m-information-circle')
            ->body('ID:' . $overtimeRequest->id . '<br/> Title: ' . $overtimeRequest->title)
            ->actions([
                Action::make('edit')
                    ->label(__('default.view_to_process'))
                    ->url(fn (): string => route('filament.administrator.resources.overtimes.edit', ['record' => $overtimeRequest]))
            ])
            ->sendToDatabase(User::role('super_admin')->get());

        try {
            Mail::to(User::role('super_admin')->get())
            ->send(new OvertimeRequestCreated($overtimeRequest));

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
                'Error Email Overtime Request to Management: ' . $exception->getMessage(),
                ['data' => $overtimeRequest]
            );
        }

    }

    /**
     * Handle the OvertimeRequest "updated" event.
     */
    public function updated(OvertimeRequest $overtimeRequest): void
    {
        if ($overtimeRequest->overtime_status === "Done") {
            $successMessage = 'Lembur ' . $overtimeRequest->title . ' Sudah selesai di proses!';
            Notification::make()
                ->title($successMessage)
                ->success()
                ->icon('heroicon-m-check-circle')
                ->body('ID:' . $overtimeRequest->id . '<br/> Title: ' . $overtimeRequest->title)
                ->actions([
                    Action::make('index')
                        ->label("Periksa")
                        ->url(fn (): string => route('filament.employee.resources.overtimes.index'))
                ])
                ->sendToDatabase($overtimeRequest->user);
            try {
                Mail::to($overtimeRequest->user)
                ->send(new OvertimeRequestDone($overtimeRequest));

                Notification::make()
                ->title('Sistem otomatis mengirim email ke ' . $overtimeRequest->user->employee->full_name)
                ->icon('heroicon-m-paper-airplane')
                ->success()
                ->send();
            } catch (\Exception $exception) {
                Notification::make()
                ->title('Sistem gagal mengirim email ke ' . $overtimeRequest->user)
                ->icon('heroicon-m-x-circle')
                ->danger()
                ->send();

                Log::error(
                    'Error Email : ' . $exception->getMessage(),
                    ['data' => $overtimeRequest]
                );
            }

        }
    }

    /**
     * Handle the OvertimeRequest "deleted" event.
     */
    public function deleted(OvertimeRequest $overtimeRequest): void
    {
        //
    }

    /**
     * Handle the OvertimeRequest "restored" event.
     */
    public function restored(OvertimeRequest $overtimeRequest): void
    {
        //
    }

    /**
     * Handle the OvertimeRequest "force deleted" event.
     */
    public function forceDeleted(OvertimeRequest $overtimeRequest): void
    {
        //
    }
}

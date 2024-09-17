<?php

namespace App\Observers;

use App\Mail\ReimbursementRequest\ReimbursementRequestCreated;
use App\Mail\ReimbursementRequest\ReimbursementRequestDone;
use App\Models\ReimbursementRequest;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ReimbursementRequestObserver
{
    /**
     * Handle the ReimbursementRequest "created" event.
     */
    public function created(ReimbursementRequest $reimbursementRequest): void
    {
        Notification::make()
            ->title('Rembes ' . $reimbursementRequest->title . ' Berhasil diajukan!')
            ->success()
            ->icon('heroicon-m-check-circle')
            ->body('ID:' . $reimbursementRequest->id . '<br/> Title: ' . $reimbursementRequest->title)
            ->sendToDatabase($reimbursementRequest->user);

        Notification::make()
            ->title('Rembes ' . $reimbursementRequest->title . ' diajukan oleh:' . $reimbursementRequest->user->employee->fullname)
            ->info()
            ->icon('heroicon-m-information-circle')
            ->body('ID:' . $reimbursementRequest->id . '<br/> Title: ' . $reimbursementRequest->title)
            ->actions([
                Action::make('edit')
                    ->label(__('default.view_to_process'))
                    ->url(fn (): string => route('filament.administrator.resources.reimbursements.edit', ['record' => $reimbursementRequest]))
            ])
            ->sendToDatabase(User::role('super_admin')->get());

        try {
            Mail::to(User::role('super_admin')->get())
            ->send(new ReimbursementRequestCreated($reimbursementRequest));

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
                'Error Email Reimbursement Request to Management: ' . $exception->getMessage(),
                ['data' => $reimbursementRequest]
            );
        }
    }

    /**
     * Handle the ReimbursementRequest "updated" event.
     */
    public function updated(ReimbursementRequest $reimbursementRequest): void
    {
        if ($reimbursementRequest->reimbursement_status === "Done") {
            $successMessage = 'Rembes ' . $reimbursementRequest->title . ' Sudah selesai di proses!';
            Notification::make()
                ->title($successMessage)
                ->success()
                ->icon('heroicon-m-check-circle')
                ->body('ID:' . $reimbursementRequest->id . '<br/> Title: ' . $reimbursementRequest->title)
                ->actions([
                    Action::make('index')
                        ->label("Periksa")
                        ->url(fn (): string => route('filament.employee.resources.reimbursements.index'))
                ])
                ->sendToDatabase($reimbursementRequest->user);

                try {
                    Mail::to($reimbursementRequest->user)
                    ->send(new ReimbursementRequestDone($reimbursementRequest));

                    Notification::make()
                    ->title('Sistem otomatis mengirim email ke ' . $reimbursementRequest->user)
                    ->icon('heroicon-m-paper-airplane')
                    ->success()
                    ->send();
                } catch (\Exception $exception) {
                    Notification::make()
                    ->title('Sistem gagal mengirim email ke ' . $reimbursementRequest->user)
                    ->icon('heroicon-m-x-circle')
                    ->danger()
                    ->send();

                    Log::error(
                        'Error Email : ' . $exception->getMessage(),
                        ['data' => $reimbursementRequest]
                    );
                }

        }
    }

    /**
     * Handle the ReimbursementRequest "deleted" event.
     */
    public function deleted(ReimbursementRequest $reimbursementRequest): void
    {
        //
    }

    /**
     * Handle the ReimbursementRequest "restored" event.
     */
    public function restored(ReimbursementRequest $reimbursementRequest): void
    {
        //
    }

    /**
     * Handle the ReimbursementRequest "force deleted" event.
     */
    public function forceDeleted(ReimbursementRequest $reimbursementRequest): void
    {
        //
    }
}

<?php

use App\Http\Controllers\ReportController;
use App\Http\Middleware\VerifyAuth;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('employee/reports')->group(function () {
    // LEAVE REQUEST REPORT
    Route::get('/leave_request/view/{record}', [ReportController::class, 'leave_request_view'])
        ->middleware(VerifyAuth::class)
        ->name('reports.leave.view');

    Route::get('/leave_request/download/{record}', [ReportController::class, 'leave_request_download'])
        ->middleware(VerifyAuth::class)
        ->name('reports.leave.download');

    // OVERTIME REQUEST REPORT
    Route::get('/overtime_request/view/{record}', [ReportController::class, 'overtime_request_view'])
        ->middleware(VerifyAuth::class)
        ->name('reports.overtime.view');

    Route::get('/overtime_request/download/{record}', [ReportController::class, 'overtime_request_download'])
        ->middleware(VerifyAuth::class)
        ->name('reports.overtime.download');

    // REIMBURSEMENT REQUEST REPORT
    Route::get('/reimbursement_request/view/{record}', [ReportController::class, 'reimbursement_request_view'])
        ->middleware(VerifyAuth::class)
        ->name('reports.reimbursement.view');

    Route::get('/reimbursement_request/download/{record}', [ReportController::class, 'reimbursement_request_download'])
        ->middleware(VerifyAuth::class)
        ->name('reports.reimbursement.download');

    // ZOOM CERTIFICATE
    Route::get('/activation_letter/view/{record}', [ReportController::class, 'activation_letter_view'])
        ->middleware(VerifyAuth::class)
        ->name('reports.activation_letter.view');

    Route::get('/activation_letter/download/{record}', [ReportController::class, 'activation_letter_download'])
        ->middleware(VerifyAuth::class)
        ->name('reports.activation_letter.download');
});

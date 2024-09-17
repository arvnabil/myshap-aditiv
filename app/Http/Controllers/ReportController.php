<?php

namespace App\Http\Controllers;

use App\Models\ActivationLetter;
use App\Models\LeaveRequest;
use App\Models\OvertimeRequest;
use App\Models\ReimbursementRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function leave_request_view(LeaveRequest $record) {
        if($record->user->id === auth()->user()->id || auth()->user()->hasRole('super_admin')){
            return view('mail.leaves.index', ['leaveRequest' => $record]);
        }
        abort(403, 'You are not allowed to access this page');
    }

    // public function leave_request_download(LeaveRequest $record) {
    //     if ($record->user->id === auth()->user()->id || auth()->user()->hasRole('super_admin')) {
    //         $pdf = Pdf::loadView('reports.leaves.index', ['leaveRequest' => $record])->setOption(['defaultFont' => 'sans-serif']);
    //         $pdf->setPaper('A4', 'potrait');

    //         $pdf->render();
    //         $pdf->stream("leave.pdf");
    //         return $pdf->download();
    //     }
    //     abort(403, 'You are not allowed to access this page');

    // }

    public function overtime_request_view(OvertimeRequest $record) {
        $recordWithItem = OvertimeRequest::with('overtime_items','user', 'user_checked_by')->find($record->id);
        if($record->user->id === auth()->user()->id || auth()->user()->hasRole('super_admin')){
            return view('mail.overtimes.index', ['overtimeRequest' => $recordWithItem]);
        }
        abort(403, 'You are not allowed to access this page');
    }
    // public function overtime_request_download(OvertimeRequest $record) {
    //     $recordWithItem = OvertimeRequest::with('overtime_items', 'user', 'user_checked_by')->find($record->id);
    //     if ($record->user->id === auth()->user()->id || auth()->user()->hasRole('super_admin')) {
    //         $pdf = Pdf::loadView('reports.overtimes.index', ['overtimeRequest' => $recordWithItem])->setOption(['defaultFont' => 'sans-serif']);
    //         $pdf->setPaper('A4', 'potrait');
    //         $pdf->render();
    //         return $pdf->download();
    //     }
    //     abort(403, 'You are not allowed to access this page');

    // }
    public function reimbursement_request_view(ReimbursementRequest $record) {
        $recordWithItem = ReimbursementRequest::with('reimbursement_items','user', 'user_checked_by')->find($record->id);
        if($record->user->id === auth()->user()->id || auth()->user()->hasRole('super_admin')){
            return view('mail.reimbursements.index', ['reimbursementRequest' => $recordWithItem]);
        }
        abort(403, 'You are not allowed to access this page');
    }
    // public function reimbursement_request_download(ReimbursementRequest $record) {
    //     $recordWithItem = ReimbursementRequest::with('reimbursement_items', 'user', 'user_checked_by')->find($record->id);
    //     if ($record->user->id === auth()->user()->id || auth()->user()->hasRole('super_admin')) {
    //         $pdf = Pdf::loadView('reports.reimbursements.index', ['reimbursementRequest' => $recordWithItem])->setOption(['defaultFont' => 'sans-serif']);
    //         $pdf->setPaper('A4', 'potrait');
    //         $pdf->render();
    //         return $pdf->download();
    //     }
    //     abort(403, 'You are not allowed to access this page');

    // }

    public function activation_letter_view(ActivationLetter $record)
    {
        if ($record->user->id === auth()->user()->id || auth()->user()->hasRole('super_admin')) {
            return view('mail.activation_letter.index', ['activation_letter' => $record]);
        }
        abort(403, 'You are not allowed to access this page');
    }

    public function activation_letter_download(ActivationLetter $record)
    {
        if ($record->user->id === auth()->user()->id || auth()->user()->hasRole('super_admin') && $record->brand->name === 'Zoom') {
            $pdf = Pdf::loadView('reports.activation_letters.zoom.index', ['activation_letter' => $record])->setOption(['defaultFont' => 'sans-serif']);
            $pdf->setPaper('A4', 'landscape');
            $pdf->render();
            return $pdf->download('Activation Letter.pdf');
        }
        abort(403, 'You are not allowed to access this page');
    }
}

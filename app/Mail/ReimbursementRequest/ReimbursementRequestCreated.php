<?php

namespace App\Mail\ReimbursementRequest;

use App\Models\ReimbursementRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReimbursementRequestCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public ReimbursementRequest $reimbursementRequest)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengajuan Rembes dari ' . $this->reimbursementRequest->user->employee->fullname,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $reimbursementItems = ReimbursementRequest::with('reimbursement_items')->where('id', $this->reimbursementRequest->id)->first();
        return new Content(
            markdown: 'mail.reimbursements.created',
            with: [
                'reimbursementItems' => $reimbursementItems->reimbursement_items,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

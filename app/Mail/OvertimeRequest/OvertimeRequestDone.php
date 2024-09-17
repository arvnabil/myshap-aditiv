<?php

namespace App\Mail\OvertimeRequest;

use App\Models\OvertimeRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OvertimeRequestDone extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public OvertimeRequest $overtimeRequest)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Proses Pengajuan lembur telah Selesai!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $overtimeRequest = OvertimeRequest::with('overtime_items')->where('id', $this->overtimeRequest->id)->first();
        return new Content(
            markdown: 'mail.overtimes.index',
            with: [
                'overtimeRequest' => $overtimeRequest,
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

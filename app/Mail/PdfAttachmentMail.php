<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PdfAttachmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfContent;

    /**
     * Create a new message instance.
     */
    public function __construct($pdfContent)
    {
        $this->pdfContent = $pdfContent;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject(__('Cálculos de'). ' ' . config('app.name'))
                    ->view('emails.pdf_mail') // a Blade view for the email body
                    ->attachData($this->pdfContent, 'calculation.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}

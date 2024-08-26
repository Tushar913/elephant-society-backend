<?php

namespace App\Mail\Test;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Enums\Unit;
use Spatie\LaravelPdf\Facades\Pdf;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public Invoice $invoice;
    public int $totalCharges;

    public function __construct(Invoice $invoice) {
        $this->invoice = $invoice;
        $this->totalCharges = $invoice->maintainance_cost +
            $invoice->water_charges +
            $invoice->vehicle_charges +
            $invoice->property_tax_cost;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Invoice Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            markdown: "notifications.invoice",
            with: [
                "totalCharges" => $this->totalCharges
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array {
        $pdfData = [
            "invoice" => $this->invoice,
            "owner" => $this->invoice->owner,
            "wing" => $this->invoice->wing,
            "society" => $this->invoice->society,
            "maintainance" => $this->invoice->maintainance,
        ];

        // Generate PDF and save to the public/test folder
        $pdfName = "invoice-".date("d-M-Y").".pdf";
        Pdf::view("invoices.show", $pdfData)
            ->format(Format::A4)
            ->margins(24, 0, 24, 0, Unit::Pixel)
            ->save(storage_path("app/public/invoices/".$pdfName));

        return [
            Attachment::fromPath(public_path("storage/invoices/{$pdfName}"))
                ->as($pdfName)
                ->withMime('application/pdf'),
        ];
    }
}

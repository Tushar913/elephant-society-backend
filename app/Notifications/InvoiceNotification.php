<?php

namespace App\Notifications;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Enums\Unit;
use Spatie\LaravelPdf\Facades\Pdf;

class InvoiceNotification extends Notification
{
    use Queueable;

    public Invoice $invoice;

    /**
     * Create a new notification instance.
     */
    public function __construct(Invoice $invoice) {
        $this->invoice = $invoice;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage {
        $totalCharges = $this->invoice->maintainance_cost +
            $this->invoice->water_charges +
            $this->invoice->vehicle_charges +
            $this->invoice->property_tax_cost;

        $pdfData = [
            "invoice" => $this->invoice,
            "owner" => $this->invoice->owner,
            "wing" => $this->invoice->wing,
            "society" => $this->invoice->society,
            "maintainance" => $this->invoice->maintainance,
        ];

        // Generate PDF and save to the public/invoices folder
        $pdfName = "invoice-".date("M-Y").".pdf";
        Pdf::view("invoices.show", $pdfData)
            ->format(Format::A4)
            ->margins(24, 0, 24, 0, Unit::Pixel)
            ->save(storage_path("app/public/invoices/".$pdfName));

        return (new MailMessage)
            ->markdown('notifications.invoice', [
                "invoice" => $this->invoice,
                "totalCharges" => $totalCharges,
                "society" => $this->invoice->society
            ])
            ->attach(Attachment::fromPath(storage_path("app/public/invoices/{$pdfName}"))
                ->as($pdfName)
                ->withMime("application/pdf"));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array {
        return [
            //
        ];
    }
}

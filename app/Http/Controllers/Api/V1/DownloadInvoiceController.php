<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Enums\Unit;
use Spatie\LaravelPdf\Facades\Pdf;

class DownloadInvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Invoice $invoice) {
        $pdfData = [
            "invoice" => $invoice,
            "owner" => $invoice->owner,
            "wing" => $invoice->wing,
            "society" => $invoice->society,
            "maintainance" => $invoice->maintainance,
        ];

        // Generate PDF and save to the public/test folder
        $pdfName = "invoice-".date("M-Y").".pdf";
        $pdf = Pdf::view("invoices.show", $pdfData)
            ->format(Format::A4)
            ->margins(24, 0, 24, 0, Unit::Pixel)
            ->download($pdfName);

        return $pdf;
    }
}

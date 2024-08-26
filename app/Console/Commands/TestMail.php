<?php

namespace App\Console\Commands;

use App\Mail\Test\InvoiceMail;
use App\Models\Invoice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a test email';

    /**
     * Execute the console command.
     */
    public function handle() {
        Log::info("testing...");
        $invoice = Invoice::where("id", 1)->with("society", "wing", "owner", "maintainance")->first();

        Mail::to("web.tarachand@gmail.com")->send(new InvoiceMail($invoice));
    }
}

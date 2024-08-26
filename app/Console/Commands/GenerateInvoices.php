<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use App\Models\MaintainceTemplate;
use App\Models\Owner;
use App\Notifications\InvoiceNotification;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class GenerateInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:invoices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates invoices for all the owners';

    /**
     * Execute the console command.
     */
    public function handle(): int {
        Log::info("running command...");
        $templates = MaintainceTemplate::all();

        foreach ($templates as $template) {


            $owners = Owner::query()->where('society_id', $template->society_id)->get();
            $ownersCount = $owners->count();

            foreach ($owners as $owner) {
                // get the invoice for previous month or recently created of the owner
                $prevInvoice = Invoice::query()->where("owner_id", $owner->id)->latest()->first();

                if (isset($prevInvoice)) {
                    if ((boolean) $prevInvoice->is_paid == 0) {
                        $newInvoice = $this->createInvoice($template, $ownersCount, $owner, $prevInvoice);
                        $newInvoice->invoice_id = $prevInvoice->id;
                    } else {
                        $newInvoice = $this->createInvoice($template, $ownersCount, $owner);
                    }
                } else {
                    $newInvoice = $this->createInvoice($template, $ownersCount, $owner);
                }
                $newInvoice->save();
            }
        }
        return 0;
    }

    public function createInvoice(
        MaintainceTemplate $template,
        int $ownersCount,
        Owner $owner,
        Invoice|Builder $prevInvoice = null,
    ): Invoice {
        Log::info('Creating new invoice...');
        $newInvoice = Invoice::create([
            'maintaince_template_id' => $template->id,
            'society_id' => $template->society_id,
            'wing_id' => $owner->wing_id,
            'owner_id' => $owner->id,
            'maintainance_cost' => ((float) $owner->flat_sqrft * (float) $template->per_sqrft_maintaince_cost) + ($prevInvoice ? (float) $prevInvoice->maintainance_cost : 0),
            'property_tax_cost' => ((float) $owner->flat_sqrft * (float) $template->per_sqrft_property_tax) + ($prevInvoice ? (float) $prevInvoice->property_tax_cost : 0),
            'water_charges' => ((float) $template->water_charges / $ownersCount) + ($prevInvoice ? (float) $prevInvoice->water_charges : 0),
            // TODO: what about electricity and other charges

            'bill_month' => now()->format('M'),
            'bill_date' => now()->format('d-m-y'),
            'bill_year' => now()->format("Y")
        ]);

        $parkingCost = 0;
        foreach ($owner->parkings as $parking) {
            if (!$parking->is_billable) {
                continue;
            }

            if ($parking->vehicle_type == 'Two wheeler') {
                $parkingCost += $template->per_two_wheeler_charges;
            } elseif ($parking->vehicle_type == 'Four wheeler') {
                $parkingCost += $template->per_four_wheeler_charges;
            }
        }

        $newInvoice->vehicle_charges = $prevInvoice ? $prevInvoice->vehicle_charges + $parkingCost : $parkingCost;
        $newInvoice->save();

        // Send the notification to the owner
        Log::info("sending notification...");
        $owner->notify(new InvoiceNotification($newInvoice));

        return $newInvoice;
    }

}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Invoice;
use App\Models\MaintainceTemplate;
use App\Models\Owner;
use App\Models\Society;
use App\Models\User;
use App\Models\Wing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // create admin
        User::factory()->admin()->create();

        // create a society and its maintenance template
        $society = Society::factory()->create();
        $maintainanceTemplate = MaintainceTemplate::factory()->create([
            "society_id" => $society->id,
        ]);

        $wingNames = ["A", "B", "C", "D"];

        foreach ($wingNames as $wing_name) {
            $wing = Wing::factory()->create([
                "wing_name" => $wing_name,
                "society_id" => $society->id,
            ]);

            for ($i = 1; $i <= fake()->numberBetween(1, $wing->no_flats); $i++) {
                Owner::factory()->create([
                    "society_id" => $society->id,
                    "wing_id" => $wing->id,
                    "flat_no" => $i,
                ]);
            }
        }

        $owners = Owner::all();
        $ownerCount = count($owners);
        foreach ($owners as $owner) {
            Invoice::factory()->create([
                "maintaince_template_id" => $maintainanceTemplate->id,
                "society_id" => $owner->society_id,
                "wing_id" => $owner->wing_id,
                "owner_id" => $owner->id,

                'maintainance_cost' => $owner->flat_sqrft * $maintainanceTemplate->per_sqrft_maintaince_cost,
                'property_tax_cost' => $owner->flat_sqrft * $maintainanceTemplate->per_sqrft_property_tax,
                'water_charges' => $maintainanceTemplate->water_charges / $ownerCount,
                'bill_month' => now()->format('M'),
                'bill_date' => now()->format('d-m-y'),
                'bill_year' => now()->format('Y'),
            ]);
        }
    }
}

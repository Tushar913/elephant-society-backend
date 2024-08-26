<?php

namespace App\Console\Commands;

use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldVisitors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visitors:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete visitors that are older than 24 hours';

    /**
     * Execute the console command.
     */
    public function handle() {
        $deletedRows = Visitor::query()
            ->where(
                "created_at",
                "<",
                Carbon::now()->subDay())->delete();
        
        $this->info("Deleted {$deletedRows} visitors that were older than 24 hours.");
    }
}

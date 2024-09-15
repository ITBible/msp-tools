<?php

namespace App\Console\Commands;

use App\Models\Paste;
use Illuminate\Console\Command;

class ClearPastes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'msp:clear-pastes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears pastes that are older than the defined days in the env file.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line('Looking for expired pastes.');
        $pastes = Paste::whereDate('created_at', '<', now()->subHour(config('paste.expire_hours')))
            ->get();

        if(count($pastes) > 0) {
            $this->line('-- Pastes found');
            foreach($pastes as $paste) {
                $this->line('--- Deleting Paste ID: ' . $paste->id);
                $paste->delete();
            }
        } else {
            $this->line('-- No expired pastes found!');
        }
    }
}

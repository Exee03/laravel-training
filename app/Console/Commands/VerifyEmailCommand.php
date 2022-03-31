<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\VerifyEmailJob;

class VerifyEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:verify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remainder for verify email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        VerifyEmailJob::dispatchSync();
        return 0;
    }
}

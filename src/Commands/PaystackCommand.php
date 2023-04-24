<?php

namespace Astrogoat\Paystack\Commands;

use Illuminate\Console\Command;

class PaystackCommand extends Command
{
    public $signature = 'paystack';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}

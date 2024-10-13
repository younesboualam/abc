<?php

namespace Technopek\LormeIspum\Commands;

use Illuminate\Console\Command;

class LormeIspumCommand extends Command
{
    public $signature = 'lorme-ispum';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

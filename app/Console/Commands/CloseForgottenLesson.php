<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CloseForgottenLesson extends Command
{
    protected $signature = 'lesson:close';

    protected $description = 'Close forgotten lessons';

    public function handle(): void
    {
        // todo change status to closed for lessons with status initial,in_progress
        //and planned_date < today
    }
}

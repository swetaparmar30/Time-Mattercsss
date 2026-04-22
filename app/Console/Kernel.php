<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:getcommercialapi-data')->everyFifteenMinutes();
        // $schedule->command('app:getresidentialapi-data')->everyFifteenMinutes();
        // $schedule->command('app:getcommercialapi-data')->everyTenMinutes();
        // $schedule->command('app:getapi-data')->everyFifteenMinutes();
        // $schedule->command('app:getapi-data')->everyMinute();

         // $schedule->command('app:getresidentialapi-data')->cron('* * * * *');
         // $schedule->command('app:getcommercialapi-data')->cron('*/10 * * * *');
         // $schedule->command('app:getapi-data')->cron('*/15 * * * *');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('prva:smena')
                  ->everyMinute();

        $schedule->command('druga:smena')
            ->everyMinute();
//         primer kako bi stvarno radilo
//        $schedule->command('prva:smena')
//            ->weekdays()
//            ->twiceDaily(16, 22);
//
//        $schedule->command('druga:smena')
//            ->weekdays()
//            ->twiceDaily(16, 22);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

<?php

namespace App\Console;

use App\Actions\Printer\PrinterRunSchedule;
use App\Actions\TemperatureGetMQTTSchedule\TemperatureGetMQTTSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        //Опрос принтеров каждый час
        $schedule->call(new PrinterRunSchedule())
            ->hourly();
        //Опрос по MQTT каждые 15 минут
        $schedule->call(new TemperatureGetMQTTSchedule())
            ->everyFifteenMinutes();
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

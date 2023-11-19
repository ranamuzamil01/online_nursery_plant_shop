<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }
    protected $signature = 'set-image-visibility {imageName}';

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    // protected $signature = 'set-image-visibility {imageName}';
    // protected $description = 'Set the visibility of an image';

    // public function handle()
    // {
    //     $imageName = $this->argument('imageName');
    //     Storage::setVisibility("public/product_images/$imageName", 'public');
    //     $this->info("Visibility for $imageName set to 'public'");
    // }


  
}

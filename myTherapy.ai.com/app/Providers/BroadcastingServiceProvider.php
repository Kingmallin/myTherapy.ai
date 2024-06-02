<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastingServiceProvider extends ServiceProvider 
{
    public function boot()
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}

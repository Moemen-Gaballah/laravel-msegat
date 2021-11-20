<?php
namespace MoemenGaballah\Msegat;

use Illuminate\Support\ServiceProvider;

class MsegatServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/msegat.php' => config_path('msegat.php'),
        ], 'msegat');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/msegat.php', 'msegat'
        );
    }
}

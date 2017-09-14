<?php namespace Tuke\Themes\Triangle\Providers;

use Illuminate\Support\ServiceProvider;

class InstallModuleServiceProvider extends ServiceProvider
{
    protected $module = 'Tuke\Themes\Triangle';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->booted(function () {
            $this->booted();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

    protected function booted()
    {

    }
}

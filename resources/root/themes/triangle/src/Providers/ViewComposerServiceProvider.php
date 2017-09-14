<?php namespace Tuke\Themes\Triangle\Providers;

use Illuminate\Support\ServiceProvider;
use Tuke\Themes\Triangle\Http\ViewComposers\BlogSidebar;
use Tuke\Themes\Triangle\Http\ViewComposers\FooterViewComposer;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'tuke-theme::front._partials.footer',
        ], FooterViewComposer::class);
        view()->composer([
            'tuke-theme::front._partials.sidebar',
        ], BlogSidebar::class);
    }
}

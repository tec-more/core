<?php namespace Tuke\Base\Providers;

use Illuminate\Support\ServiceProvider;
use Tuke\Base\Http\ViewComposers\AdminBreadcrumbsViewComposer;
use Tuke\Base\Http\ViewComposers\BasePartialsViewComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'tuke-core::admin._partials.breadcrumbs',
        ], AdminBreadcrumbsViewComposer::class);
        view()->composer([
            'tuke-core::front._admin-bar',
            'tuke-core::admin._partials.header',
            'tuke-core::admin._partials.sidebar',
        ], BasePartialsViewComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}

<?php namespace Tuke\Base\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Tuke\Base\Http\Middleware\AdminBarMiddleware;
use Tuke\Base\Http\Middleware\BootstrapModuleMiddleware;
use Tuke\Base\Http\Middleware\ConstructionModeMiddleware;
use Tuke\Base\Http\Middleware\CorsMiddleware;
use Tuke\Base\Http\Middleware\DashboardLanguageMiddleware;

class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * @var Router $router
         */
        $router = $this->app['router'];

        if(!is_admin_panel()) {
            $router->pushMiddlewareToGroup('web', ConstructionModeMiddleware::class);
            $router->pushMiddlewareToGroup('web', AdminBarMiddleware::class);
            $router->pushMiddlewareToGroup('api', CorsMiddleware::class);
            $router->pushMiddlewareToGroup('web', DashboardLanguageMiddleware::class);
        } else {
            $router->pushMiddlewareToGroup('web', DashboardLanguageMiddleware::class);
        }
    }
}

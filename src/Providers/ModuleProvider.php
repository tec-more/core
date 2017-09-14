<?php namespace Tuke\Base\Providers;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Tuke\Base\Exceptions\Handler;
use Tuke\Base\Facades\AdminBarFacade;
use Tuke\Base\Facades\BreadcrumbsFacade;
use Tuke\Base\Facades\FlashMessagesFacade;
use Tuke\Base\Facades\SeoFacade;
use Tuke\Base\Facades\ViewCountFacade;
use Tuke\Base\Http\Middleware\BootstrapModuleMiddleware;
use Tuke\Base\Support\Helper;

class ModuleProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'tuke-core');
        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'tuke-core');
        /*Load migrations*/
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->publishes([
            __DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/tuke-core',
        ], 'views');
        $this->publishes([
            __DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/tuke-core'),
        ], 'lang');
        $this->publishes([
            __DIR__ . '/../../config' => base_path('config'),
        ], 'config');
        $this->publishes([
            __DIR__ . '/../../resources/assets' => resource_path('assets'),
        ], 'tuke-assets');
        $this->publishes([
            __DIR__ . '/../../resources/root' => base_path(),
            __DIR__ . '/../../resources/public' => public_path(),
        ], 'tuke-public-assets');

        app()->booted(function () {
            $this->app->register(BootstrapModuleServiceProvider::class);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //Load helpers
        Helper::loadModuleHelpers(__DIR__);

        $this->app->singleton(ExceptionHandler::class, Handler::class);

        //Register related facades
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Breadcrumbs', BreadcrumbsFacade::class);
        $loader->alias('FlashMessages', FlashMessagesFacade::class);
        $loader->alias('AdminBar', AdminBarFacade::class);
        $loader->alias('ViewCount', ViewCountFacade::class);
        $loader->alias('Form', \Collective\Html\FormFacade::class);
        $loader->alias('Html', \Collective\Html\HtmlFacade::class);
        $loader->alias('Seo', SeoFacade::class);

        //Merge configs
        $configs = split_files_with_basename($this->app['files']->glob(__DIR__ . '/../../config/*.php'));

        foreach ($configs as $key => $row) {
            $this->mergeConfigFrom($row, $key);
        }

        /**
         * Other packages
         */
        $this->app->register(\Yajra\Datatables\DatatablesServiceProvider::class);
        $this->app->register(\Collective\Html\HtmlServiceProvider::class);

        /**
         * Base providers
         */
        $this->app->register(HookServiceProvider::class);
        $this->app->register(ConsoleServiceProvider::class);
        $this->app->register(MiddlewareServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(ValidateServiceProvider::class);
        $this->app->register(ComposerServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(CollectiveServiceProvider::class);

        /**
         * @var Router $router
         */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', BootstrapModuleMiddleware::class);

        /**
         * Other module providers
         */
        $this->app->register(\Tuke\Base\Plugin\Providers\ModuleProvider::class);
        //$this->app->register(\Tuke\Base\Theme\Providers\ModuleProvider::class);


        config(['tuke.version' => get_cms_version()]);
    }
}

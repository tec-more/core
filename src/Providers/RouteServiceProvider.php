<?php

namespace Tuke\Base\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Tuke\Base\Http\Controllers';

    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../../routes/web.php');

        Route::prefix(config('tuke.api_route', 'api'))
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../../routes/api.php');
    }
}

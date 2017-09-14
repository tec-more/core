<?php namespace Tuke\Base\Providers;

use Illuminate\Support\ServiceProvider;
use Tuke\Base\Models\ViewTracker;
use Tuke\Base\Repositories\Contracts\ViewTrackerRepositoryContract;
use Tuke\Base\Repositories\ViewTrackerRepository;
use Tuke\Base\Repositories\ViewTrackerRepositoryCacheDecorator;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ViewTrackerRepositoryContract::class, function () {
            $repository = new ViewTrackerRepository(new ViewTracker());

            if (config('tuke-caching.repository.enabled')) {
                return new ViewTrackerRepositoryCacheDecorator($repository);
            }

            return $repository;
        });
    }
}

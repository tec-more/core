<?php namespace Tuke\Base\Repositories;

use Tuke\Base\Repositories\Eloquent\EloquentBaseRepositoryCacheDecorator;

use Tuke\Base\Models\Contracts\ViewTrackerModelContract;
use Tuke\Base\Repositories\Contracts\ViewTrackerRepositoryContract;

class ViewTrackerRepositoryCacheDecorator extends EloquentBaseRepositoryCacheDecorator  implements ViewTrackerRepositoryContract
{
    /**
     * @param ViewTrackerModelContract $viewTracker
     * @return array
     */
    public function increase(ViewTrackerModelContract $viewTracker)
    {
        return $this->afterUpdate(__FUNCTION__, func_get_args());
    }
}

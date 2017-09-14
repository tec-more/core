<?php namespace Tuke\Base\Repositories\Contracts;

use Tuke\Base\Models\Contracts\ViewTrackerModelContract;

interface ViewTrackerRepositoryContract
{
    /**
     * @param ViewTrackerModelContract $viewTracker
     * @return array
     */
    public function increase(ViewTrackerModelContract $viewTracker);
}

<?php namespace Tuke\Base\Repositories;

use Tuke\Base\Models\Contracts\ViewTrackerModelContract;
use Tuke\Base\Models\ViewTracker;
use Tuke\Base\Repositories\Contracts\ViewTrackerRepositoryContract;
use Tuke\Base\Repositories\Eloquent\EloquentBaseRepository;

class ViewTrackerRepository extends EloquentBaseRepository implements ViewTrackerRepositoryContract
{
    /**
     * @param ViewTracker $viewTracker
     * @return int
     */
    public function increase(ViewTrackerModelContract $viewTracker)
    {
        return $this->update($viewTracker, [
            'count' => $viewTracker->count + 1
        ]);
    }
}

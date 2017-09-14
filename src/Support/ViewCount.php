<?php namespace Tuke\Base\Support;

use Tuke\Base\Models\Contracts\BaseModelContract;
use Tuke\Base\Models\EloquentBase;
use Tuke\Base\Repositories\Contracts\ViewTrackerRepositoryContract;
use Tuke\Base\Repositories\ViewTrackerRepository;

class ViewCount
{
    /**
     * @var ViewTrackerRepositoryContract|ViewTrackerRepository
     */
    protected $repository;

    /**
     * ViewCount constructor.
     * @param ViewTrackerRepository $repository
     */
    public function __construct(ViewTrackerRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param EloquentBase|string $entity
     * @param $entityId
     */
    public function increase($entity, $entityId)
    {
        if ($entity instanceof BaseModelContract) {
            $entity = get_class($entity);
        }
        $viewTracker = $this->repository->findWhereOrCreate([
            'entity' => $entity,
            'entity_id' => $entityId,
        ]);
        return $this->repository->increase($viewTracker);
    }
}

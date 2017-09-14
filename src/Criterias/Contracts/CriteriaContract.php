<?php namespace Tuke\Base\Criterias\Contracts;

use Tuke\Base\Models\Contracts\BaseModelContract;
use Tuke\Base\Repositories\AbstractBaseRepository;
use Tuke\Base\Repositories\Contracts\AbstractRepositoryContract;

interface CriteriaContract
{
    /**
     * @param BaseModelContract $model
     * @param AbstractBaseRepository $repository
     * @return mixed
     */
    public function apply($model, AbstractRepositoryContract $repository);
}

<?php namespace Tuke\Base\Repositories\Contracts;

use Tuke\Base\Criterias\AbstractCriteria;
use Tuke\Base\Models\Contracts\BaseModelContract;
use Illuminate\Support\Collection;
use Tuke\Base\Exceptions\Repositories\WrongCriteria;
use Tuke\Base\Criterias\Contracts\CriteriaContract;
use Illuminate\Pagination\LengthAwarePaginator;

interface AbstractRepositoryContract
{
    /**
     * @return BaseModelContract
     */
    public function getModel();

    /**
     * Get model table
     * @return string
     */
    public function getTable();

    /**
     * Get primary key
     * @return string
     */
    public function getPrimaryKey();

    /**
     * @return Collection
     */
    public function getCriteria();

    /**
     * @param AbstractCriteria $criteria
     * @return $this
     * @throws WrongCriteria
     */
    public function pushCriteria(CriteriaContract $criteria);

    /**
     * @param AbstractCriteria|string $criteria
     * @return $this
     */
    public function dropCriteria($criteria);

    /**
     * @param bool $bool
     * @return $this
     */
    public function skipCriteria($bool = true);

    /**
     * @return $this
     */
    public function applyCriteria();

    /**
     * @param AbstractCriteria $criteria
     * @param array $constructorArgs
     * @return Collection|BaseModelContract|LengthAwarePaginator|null|mixed
     */
    public function getByCriteria(CriteriaContract $criteria);

    /**
     * @return $this
     */
    public function resetModel();
}

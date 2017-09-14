<?php namespace Tuke\Base\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Tuke\Base\Criterias\AbstractCriteria;
use Tuke\Base\Criterias\Contracts\CriteriaContract;
use Tuke\Base\Exceptions\Repositories\WrongCriteria;
use Tuke\Base\Models\Contracts\BaseModelContract;
use Tuke\Base\Caching\Services\Contracts\CacheableContract;
use Tuke\Base\Caching\Services\Traits\Cacheable;
use Tuke\Base\Repositories\Contracts\AbstractRepositoryContract;

abstract class AbstractRepositoryCacheDecorator implements AbstractRepositoryContract, CacheableContract
{
    use Cacheable;

    /**
     * @var AbstractBaseRepository|Cacheable
     */
    protected $repository;

    /**
     * @var \Tuke\Base\Caching\Services\CacheService
     */
    protected $cache;

    /**
     * @var bool
     */
    protected $cacheEnabled = true;

    /**
     * @param $repository
     */
    public function __construct($repository, $cacheKeyGroup = null)
    {
        $this->repository = $repository;

        $this->cache = app(\Tuke\Base\Caching\Services\Contracts\CacheServiceContract::class);

        $this->cache
            ->setCacheObject($this)
            ->setCacheGroup($cacheKeyGroup)
            ->setCacheLifetime(config('tuke-caching.repository.lifetime'))
            ->setCacheFile(config('tuke-caching.repository.store_keys'));
    }

    /**
     * @return AbstractBaseRepository|Cacheable
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @return \Tuke\Base\Caching\Services\CacheService
     */
    public function getCacheInstance()
    {
        return $this->cache;
    }

    /**
     * @param $lifetime
     * @return $this
     */
    public function setCacheLifetime($lifetime)
    {
        $this->cache->setCacheLifetime($lifetime);

        return $this;
    }

    /**
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function beforeGet($method, $parameters)
    {
        $repository = clone $this->repository;

        $criterias = $this->getCriteria();

        $this->cache->setCacheKey($method, array_merge($parameters, $criterias));

        /**
         * Clear params
         */
        $this->repository->resetModel();

        return $this->cache->retrieveFromCache(function () use ($repository, $method, $parameters) {
            return call_user_func_array([$repository, $method], $parameters);
        });
    }

    /**
     * @param $method
     * @param $parameters
     * @param bool $flushCache
     * @return mixed
     */
    public function afterUpdate($method, $parameters, $flushCache = true, $forceFlush = false)
    {
        $result = call_user_func_array([$this->repository, $method], $parameters);

        if ($flushCache === true && ($forceFlush === true || $result)) {
            $this->cache->flushCache();
        }

        return $result;
    }

    /**
     * @return BaseModelContract
     */
    public function getModel()
    {
        return call_user_func_array([$this->repository, __FUNCTION__], func_get_args());
    }

    /**
     * Get model table
     * @return string
     */
    public function getTable()
    {
        return call_user_func_array([$this->repository, __FUNCTION__], func_get_args());
    }

    /**
     * Get primary key
     * @return string
     */
    public function getPrimaryKey()
    {
        return call_user_func_array([$this->repository, __FUNCTION__], func_get_args());
    }

    /**
     * @return array
     */
    public function getCriteria()
    {
        return call_user_func_array([$this->repository, __FUNCTION__], func_get_args());
    }

    /**
     * @param AbstractCriteria $criteria
     * @param array $crossData
     * @return $this
     * @throws WrongCriteria
     */
    public function pushCriteria(CriteriaContract $criteria)
    {
        call_user_func_array([$this->repository, __FUNCTION__], func_get_args());
        return $this;
    }

    /**
     * @param $criteria
     * @return $this
     */
    public function dropCriteria($criteria)
    {
        call_user_func_array([$this->repository, __FUNCTION__], func_get_args());
        return $this;
    }

    /**
     * @param bool $bool
     * @return $this
     */
    public function skipCriteria($bool = true)
    {
        call_user_func_array([$this->repository, __FUNCTION__], func_get_args());
        return $this;
    }

    /**
     * @return $this
     */
    public function applyCriteria()
    {
        call_user_func_array([$this->repository, __FUNCTION__], func_get_args());
        return $this;
    }

    /**
     * @param AbstractCriteria|string $criteria
     * @return Collection|BaseModelContract|LengthAwarePaginator|null|mixed
     */
    public function getByCriteria(CriteriaContract $criteria)
    {
        return $this->beforeGet(__FUNCTION__, func_get_args());
    }

    /**
     * @return $this
     */
    public function resetModel()
    {
        call_user_func_array([$this->repository, __FUNCTION__], func_get_args());
        return $this;
    }
}

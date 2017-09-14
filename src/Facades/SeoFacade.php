<?php namespace Tuke\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Tuke\Base\Support\SEO;
use Tuke\Base\Support\ViewCount;

class SeoFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SEO::class;
    }
}

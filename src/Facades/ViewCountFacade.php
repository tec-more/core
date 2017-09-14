<?php namespace Tuke\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Tuke\Base\Support\ViewCount;

class ViewCountFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ViewCount::class;
    }
}

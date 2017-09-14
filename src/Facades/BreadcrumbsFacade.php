<?php namespace Tuke\Base\Facades;

use Illuminate\Support\Facades\Facade;

class BreadcrumbsFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Tuke\Base\Support\Breadcrumbs::class;
    }
}

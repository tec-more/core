<?php namespace Tuke\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Tuke\Base\Support\AdminQuickLink;

class AdminQuickLinkFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return AdminQuickLink::class;
    }
}

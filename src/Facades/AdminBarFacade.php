<?php namespace Tuke\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Tuke\Base\Support\AdminBar;

class AdminBarFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return AdminBar::class;
    }
}

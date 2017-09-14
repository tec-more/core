<?php namespace Tuke\Base\Hook\Support\Facades;

use Illuminate\Support\Facades\Facade;
use Tuke\Base\Hook\Support\Actions;

class ActionsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Actions::class;
    }
}

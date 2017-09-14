<?php namespace Tuke\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Tuke\Base\Support\DataTable\DataTables;

class DataTablesFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return DataTables::class;
    }
}

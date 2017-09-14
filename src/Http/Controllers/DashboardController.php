<?php namespace Tuke\Base\Http\Controllers;

class DashboardController extends BaseAdminController
{
    protected $module = 'tuke-core';

    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        $this->setPageTitle(trans('tuke-core::stats.dashboard_statistics'));
        $this->getDashboardMenu('tuke-dashboard');
        return do_filter(BASE_FILTER_CONTROLLER, $this, TUKE_DASHBOARD_STATS)->viewAdmin('dashboard');
    }
}

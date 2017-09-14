<?php namespace Tuke\Base\Http\Controllers;

use Tuke\Base\Facades\DashboardLanguageFacade;

class DashboardLanguageController extends BaseController
{
    protected $module = 'tuke-core';

    public function getChangeLanguage($languageSlug)
    {
        DashboardLanguageFacade::setDashboardLanguage($languageSlug);

        return redirect()->back();
    }
}

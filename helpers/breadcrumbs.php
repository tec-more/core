<?php

if (!function_exists('breadcrumbs')) {
    /**
     * @return \Tuke\Base\Support\Breadcrumbs
     */
    function breadcrumbs()
    {
        return \Tuke\Base\Facades\BreadcrumbsFacade::getFacadeRoot();
    }
}
<?php

if (!function_exists('admin_quick_link')) {
    /**
     * @return \Tuke\Base\Support\AdminQuickLink
     */
    function admin_quick_link()
    {
        return \Tuke\Base\Facades\AdminQuickLinkFacade::getFacadeRoot();
    }
}
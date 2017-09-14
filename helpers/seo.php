<?php

if (!function_exists('seo')) {
    /**
     * @return \Tuke\Base\Support\SEO
     */
    function seo()
    {
        return \Tuke\Base\Facades\SeoFacade::getFacadeRoot();
    }
}

<?php namespace Tuke\Themes\Triangle\Http\ViewComposers;

use Illuminate\View\View;

class FooterViewComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $homepageId = get_theme_option('footer_content_page', 0);

        if ($homepageId) {
            $view->with([
                'testimonials' => get_field($homepageId, TUKE_PAGES, 'testimonials', []),
                'contacts' => get_field($homepageId, TUKE_PAGES, 'contacts'),
                'address' => get_field($homepageId, TUKE_PAGES, 'address'),
            ]);
        }
    }
}
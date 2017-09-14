<?php namespace Tuke\Base\Http\Middleware;

use \Closure;

class BootstrapModuleMiddleware
{
    public function __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  array|string $params
     * @return mixed
     */
    public function handle($request, Closure $next, ...$params)
    {
        $this->registerMenu();
        $this->generalSettings();
        $this->socialNetworks();

        return $next($request);
    }

    protected function registerMenu()
    {
        /**
         * Register to dashboard menu
         */
//        dashboard_menu()->registerItem([
//            'id' => 'tuke-dashboard',
//            'priority' => -999,
//            'parent_id' => null,
//            'heading' => trans('tuke-core::base.admin_menu.dashboard.heading'),
//            'title' => trans('tuke-core::base.admin_menu.dashboard.title'),
//            'font_icon' => 'icon-pie-chart',
//            'link' => route('admin::dashboard.index.get'),
//            'css_class' => null,
//        ]);
//
//        dashboard_menu()->registerItem([
//            'id' => 'tuke-configuration',
//            'priority' => 999,
//            'parent_id' => null,
//            'heading' => trans('tuke-core::base.admin_menu.configuration.heading'),
//            'title' => trans('tuke-core::base.admin_menu.configuration.title'),
//            'font_icon' => 'icon-settings',
//            'link' => route('admin::settings.index.get'),
//            'css_class' => null,
//        ]);
    }

    protected function generalSettings()
    {
//        cms_settings()
//            ->addSettingField('mini_copyright', [
//                'group' => 'basic',
//                'type' => 'text',
//                'priority' => 5,
//                'label' => trans('tuke-core::base.settings.mini_copyright.label'),
//                //'helper' => trans('tuke-core::base.settings.mini_copyright_name.helper')
//            ], function () {
//                return [
//                    'mini_copyright',
//                    get_setting('mini_copyright'),
//                    ['class' => 'form-control']
//                ];
//            })
//            ->addSettingField('mini_copyright_name', [
//                'group' => 'basic',
//                'type' => 'text',
//                'priority' => 5,
//                'label' => trans('tuke-core::base.settings.mini_copyright_name.label'),
//                //'helper' => trans('tuke-core::base.settings.mini_copyright_name.helper')
//            ], function () {
//                return [
//                    'mini_copyright_name',
//                    get_setting('mini_copyright_name'),
//                    ['class' => 'form-control']
//                ];
//            })
//            ->addSettingField('copyright', [
//                'group' => 'basic',
//                'type' => 'text',
//                'priority' => 5,
//                'label' => trans('tuke-core::base.settings.copyright.label'),
//                //'helper' => trans('tuke-core::base.settings.copyright.helper')
//            ], function () {
//                return [
//                    'copyright',
//                    get_setting('copyright'),
//                    ['class' => 'form-control']
//                ];
//            })
//
//            ->addSettingField('site_title', [
//                'group' => 'basic',
//                'type' => 'text',
//                'priority' => 5,
//                'label' => trans('tuke-core::base.settings.site_title.label'),
//                'helper' => trans('tuke-core::base.settings.site_title.helper')
//            ], function () {
//                return [
//                    'site_title',
//                    get_setting('site_title'),
//                    ['class' => 'form-control']
//                ];
//            })
//
//            ->addSettingField('site_logo', [
//                'group' => 'basic',
//                'type' => 'selectImageBox',
//                'priority' => 5,
//                'label' => trans('tuke-core::base.settings.site_logo.label'),
//                'helper' => trans('tuke-core::base.settings.site_logo.helper')
//            ], function () {
//                return [
//                    'site_logo',
//                    get_setting('site_logo'),
//                    null,
//                    trans('tuke-core::base.form.choose_image'),
//                ];
//            })
//            ->addSettingField('favicon', [
//                'group' => 'basic',
//                'type' => 'selectImageBox',
//                'priority' => 5,
//                'label' => trans('tuke-core::base.settings.favicon.label'),
//                'helper' => trans('tuke-core::base.settings.favicon.helper'),
//            ], function () {
//                return [
//                    'favicon',
//                    get_setting('favicon'),
//                    null,
//                    trans('tuke-core::base.form.choose_image'),
//                ];
//            })
//            ->addSettingField('construction_mode', [
//                'group' => 'advanced',
//                'type' => 'customCheckbox',
//                'priority' => 5,
//                'label' => null,
//                'helper' => trans('tuke-core::base.settings.construction_mode.helper'),
//            ], function () {
//                return [
//                    [['construction_mode', '1', trans('tuke-core::base.settings.construction_mode.label'), get_setting('construction_mode'),]],
//                ];
//            })
//            ->addSettingField('show_admin_bar', [
//                'group' => 'advanced',
//                'type' => 'customCheckbox',
//                'priority' => 5,
//                'label' => null,
//                'helper' => trans('tuke-core::base.settings.show_admin_bar.helper')
//            ], function () {
//                return [
//                    [['show_admin_bar', '1', trans('tuke-core::base.settings.show_admin_bar.label'), get_setting('show_admin_bar')]],
//                ];
//            });
    }

    protected function socialNetworks()
    {
//        cms_settings()->addGroup('socials', trans('tuke-core::base.setting_group.socials'));
//
//        $socials = [
//            'facebook' => [
//                'label' => trans('tuke-core::base.settings.socials.facebook'),
//            ],
//            'youtube' => [
//                'label' => trans('tuke-core::base.settings.socials.youtube'),
//            ],
//            'twitter' => [
//                'label' => trans('tuke-core::base.settings.socials.twitter'),
//            ],
//            'google_plus' => [
//                'label' => trans('tuke-core::base.settings.socials.google_plus'),
//            ],
//            'instagram' => [
//                'label' => trans('tuke-core::base.settings.socials.instagram'),
//            ],
//            'linkedin' => [
//                'label' => trans('tuke-core::base.settings.socials.linkedin'),
//            ],
//            'flickr' => [
//                'label' => trans('tuke-core::base.settings.socials.flickr'),
//            ],
//        ];
//        foreach ($socials as $key => $row) {
//            cms_settings()->addSettingField($key, [
//                'group' => 'socials',
//                'type' => 'text',
//                'priority' => 1,
//                'label' => $row['label'],
//                'helper' => null
//            ], function () use ($key) {
//                return [
//                    $key,
//                    get_setting($key),
//                    [
//                        'class' => 'form-control',
//                        'placeholder' => 'https://',
//                        'autocomplete' => 'off'
//                    ]
//                ];
//            });
//        }
    }
}

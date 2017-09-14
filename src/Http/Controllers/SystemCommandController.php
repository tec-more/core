<?php namespace Tuke\Base\Http\Controllers;

class SystemCommandController extends BaseAdminController
{
    protected $module = 'tuke-core';

    /**
     * Call command composer dump-autoload
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getCallDumpAutoload()
    {
        modules_plugin()->refreshComposerAutoload();
        flash_messages()
            ->addMessages('Composer autoload refreshed', 'success')
            ->showMessagesOnSession();

        return redirect()->back();
    }

    public function getUpdateCms()
    {

        $app = app();

        $updated = 0;

//        foreach ($modules as $namespace => $module) {
//            if (
//                get_core_module_composer_version(array_get($module, 'repos')) === array_get($module, 'installed_version')
//                || !module_version_compare(get_core_module_composer_version(array_get($module, 'repos')), '^' . array_get($module, 'installed_version', 0))
//            ) {
//                continue;
//            }
//
//            $updateModuleProvider = str_replace('\\\\', '\\', array_get($module, 'namespace', '') . '\Providers\UpdateModuleServiceProvider');
//            if (class_exists($updateModuleProvider)) {
//                $app->register($updateModuleProvider);
//            }
//
//
//            $moduleProvider = str_replace('\\\\', '\\', array_get($module, 'namespace', '') . '\Providers\ModuleProvider');
//            \Artisan::call('vendor:publish', [
//                '--provider' => $moduleProvider,
//                '--tag' => 'tuke-public-assets',
//                '--force' => true
//            ]);
//
//            $updated++;
//        }

        if ($updated) {
            flash_messages()
                ->addMessages($updated . ' modules updated', 'success');
        } else {
            flash_messages()
                ->addMessages('Your cms already up to date', 'info');
        }
        flash_messages()
            ->showMessagesOnSession();

        return redirect()->back();
    }
}

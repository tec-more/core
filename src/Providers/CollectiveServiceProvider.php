<?php namespace Tuke\Base\Providers;

use Illuminate\Support\ServiceProvider;

use Form;
use Html;

class CollectiveServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->registerFormComponents();
        $this->registerHtmlComponents();
    }

    protected function registerFormComponents()
    {
        /**
         * Custom checkbox
         * Every checkbox will not have the same name
         */
        Form::component('customCheckbox', 'tuke-core::admin._components.custom-checkbox', [
            /**
             * @var array $values
             * @template: [
             *      [string $name, string $value, string $label, bool $selected, bool $disabled],
             *      [string $name, string $value, string $label, bool $selected, bool $disabled],
             *      [string $name, string $value, string $label, bool $selected, bool $disabled],
             * ]
             */
            'values',
        ]);

        /**
         * Custom radio
         * Every radio in list must have the same name
         */
        Form::component('customRadio', 'tuke-core::admin._components.custom-radio', [
            /**
             * @var string $name
             */
            'name',
            /**
             * @var array $values
             * @template: [
             *      [string $value, string $label, bool $disabled],
             *      [string $value, string $label, bool $disabled],
             *      [string $value, string $label, bool $disabled],
             * ]
             */
            'values',
            /**
             * @var string|null $selected
             */
            'selected' => null,
        ]);

        /**
         * Select image box
         */
        Form::component('selectImageBox', 'tuke-core::admin._components.select-image-box', [
            'name',
            'value' => null,
            'thumbnail' => null,
            'label' => null,
        ]);

        /**
         * Select file box
         */
        Form::component('selectFileBox', 'tuke-core::admin._components.select-file-box', [
            'name',
            'value' => null,
            'thumbnail' => null,
            'label' => null,
        ]);
    }

    protected function registerHtmlComponents()
    {
        /**
         * Label
         */
        Html::component('label', 'tuke-core::admin._components.label', [
            'text',
            'type' => 'default',
            'tag' => 'span',
        ]);

        /**
         * Note
         */
        Html::component('note', 'tuke-core::admin._components.note', [
            'text',
            'type' => 'default',
            'dismissable' => true,
        ]);
    }
}

<?php

namespace App\Modules\UI\Providers;

use App\Modules\Shared\Providers\ModularServiceProvider;


class UIServiceProvider extends ModularServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ui');
        $this->mapUiRoutes(__DIR__);
    }

    public function register()
    {

    }
}
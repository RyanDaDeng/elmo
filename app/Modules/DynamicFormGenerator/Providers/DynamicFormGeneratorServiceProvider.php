<?php

namespace App\Modules\DynamicFormGenerator\Providers;

use App\Modules\Shared\Providers\ModularServiceProvider;


class DynamicFormGeneratorServiceProvider extends ModularServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mapWebRoutes(__DIR__);
    }

    public function register()
    {

    }
}
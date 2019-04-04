<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2019/4/3
 * Time: 9:17 PM
 */

namespace App\Modules\Shared\Providers;

use Illuminate\Support\ServiceProvider;

class ModularServiceProvider extends ServiceProvider
{
    /**
     * @param $path
     */
    protected function mapWebRoutes($path)
    {
        $this->loadRoutesFrom($path . '/../routes/web.php');
    }

    /**
     * @param $path
     */
    protected function mapApiRoutes($path)
    {
        $this->loadRoutesFrom($path . '/../routes/api.php');
    }


    /**
     * @param $path
     */
    protected function mapUiRoutes($path)
    {
        $this->loadRoutesFrom($path . '/../routes/ui.php');
    }
}
<?php
namespace Orchids\DemoKit\Providers;

use Illuminate\Console\Command;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\View;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
//***use App\Http\Composers\MenuComposer;

class DemoKitProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     * After change run:  php artisan vendor:publish --provider="Orchids\DemoKit\Providers\DemoKitProvider"
     */
    public function boot(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;

        View::composer('platform::layouts.dashboard', MenuComposer::class);
        View::composer('platform::container.systems.index', SystemMenuComposer::class);

        $this->loadViewsFrom(realpath(DEMOKIT_PATH.'/resources/views'), 'orchids/demokit');

        //$this->loadMigrationsFrom(realpath(__DIR__.'/../../database/migrations'));
   		//$this->loadRoutesFrom(realpath(DEMOKIT_PATH.'/routes/route.php'));  //Файл роутинга

        $this->app->make(Factory::class)->load(realpath(DEMOKIT_PATH.'/database/factories'));
/*
        $this->publishes([
            realpath( DEMOKIT_PATH.'/public/') => public_path('orchids/demokit'),
        ], 'public');*/
/*
        $this->dashboard->registerResource(
            [
                'stylesheets' => ['/orchids/demokit/css/demokit.css'],
                'scripts'     => ['/orchids/demokit/js/demokit.js'],
            ]
        );
*/
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(DashboardProvider::class);

        $this->app->booted(function () {
            $this->dashboard->registerPermissions($this->registerPermissions());
        });
    }

    /**
     * @return array
     */
    protected function registerPermissions(): ItemPermission
    {
        return ItemPermission::group(__('Systems'))
            ->addPermission('platform.demokit', __('Demo Kit'));
    }

    /**
     * Register the service provider.
     */
    public function register()
    {

        if (! defined('DEMOKIT_PATH')) {
            define('DEMOKIT_PATH', realpath(__DIR__.'/../../'));
        }
    }
}
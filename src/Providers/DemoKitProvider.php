<?php
namespace Orchids\DemoKit\Providers;

use Illuminate\Console\Command;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\View;
use Orchid\Platform\Dashboard;

class DemoKitProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     * After change run:  php artisan vendor:publish --provider="Orchids\DemoKit\Providers\DemoKitProvider"
     */
    public function boot(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;

        $this->app->make(Factory::class)->load(realpath(__DIR__.'/../../database/factories'));

        $this->dashboard->registerPermissions($this->registerPermissions());
        //$this->loadMigrationsFrom(realpath(__DIR__.'/../../database/migrations'));
   		$this->loadRoutesFrom(realpath(__DIR__.'/../../routes/route.php'));  //Файл роутинга

        View::composer('platform::layouts.dashboard', MenuComposer::class);
        View::composer('platform::container.systems.index', SystemMenuComposer::class);
    }

    /**
     * @return array
     */
    protected function registerPermissions(): array
    {
        return [
            trans('platform::permission.main.systems') => [
                [
                    'slug' => 'platform.demokit',
                    'description' => 'Demo Kit',
                ],
            ],
        ];
    }
}
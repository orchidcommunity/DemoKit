<?php

namespace Orchids\DemoKit\Providers;

use Orchid\Platform\Dashboard;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class DashboardProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard)
    {
        $dashboard->registerResource([
            'stylesheets' => ['/orchids/demokit/css/demokit.css'],
            'scripts'     => ['/orchids/demokit/js/demokit.js'],
        ]);
    }
}
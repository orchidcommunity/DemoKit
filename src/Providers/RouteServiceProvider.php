<?php

namespace Orchids\DemoKit\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Orchid\Platform\Http\Middleware\AccessMiddleware;
use Orchid\Platform\Widget\WidgetContractInterface;
use Orchid\Press\Models\Post;



class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    //protected $namespace = 'Salador\Turbase\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @internal param Router $router
     */
    public function boot()
    {
        Route::middlewareGroup('dashboard', [
            //Firewall::class,
            // RedirectInstall::class,
            AccessMiddleware::class,
        ]);


        if (class_exists('Breadcrumbs')) {
            require DEMOKIT_PATH.'/routes/breadcrumbs.php';
        }

        $this->binding();

        parent::boot();
    }

    /**
     * Route binding.
     */
    public function binding()
    {

        Route::bind('postscreen', function ($value) {
			return Post::firstOrNew(['id'=>$value]);
        });

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
		//$this->loadRoutesFrom(realpath(__DIR__.'/../../routes/route.php'));  //Файл роутинга
        $this->loadRoutesFrom(realpath(DEMOKIT_PATH.'/routes/route.php'));   //Файл роутинга
    }
}

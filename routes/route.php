<?php


Route::domain((string) config('platform.domain'))
    ->prefix(Dashboard::prefix('/screens'))
    ->middleware(config('platform.middleware.private'))
    ->namespace('Orchids\DemoKit\Http\Screens')
    ->group(function (\Illuminate\Routing\Router $router, $path='platform.demokit.') {
        $router->screen('screen1/{postscreen}/edit', 'Screen1\DemoScreen1Edit',$path.'screen1.edit');
        $router->screen('screen1/create', 'Screen1\DemoScreen1Edit',$path.'screen1.create');
        $router->screen('screen1', 'Screen1\DemoScreen1List',$path.'screen1.list');

        $router->screen('screen2', 'Screen2\DemoScreen2Edit',$path.'screen2.edit');

        $router->screen('screen3/{screen3}/column', 'Screen3\DemoScreen3Edit',$path.'screen3.edit');
        $router->screen('screen3', 'Screen3\DemoScreen3List',$path.'screen3.list');

    });


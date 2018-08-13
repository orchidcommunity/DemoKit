<?php


Route::domain((string) config('platform.domain'))
    ->prefix(Dashboard::prefix('/screens'))
    ->middleware(config('platform.middleware.private'))
    ->namespace('Orchids\DemoKit\Http\Screens')
    ->group(function (\Illuminate\Routing\Router $router, $path='platform.demokit.') {
        $router->screen('screens1/{screens1}/edit', 'Screen1\DemoScreen1Edit',$path.'screen1.edit');
        $router->screen('screens1/create', 'Screen1\DemoScreen1Edit',$path.'screen1.create');
        $router->screen('screens1', 'Screen1\DemoScreen1List',$path.'screen1.list');


    });


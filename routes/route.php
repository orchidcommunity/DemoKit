<?php
use Orchids\DemoKit\Http\Screens\Step1\DemokitStep1;
use Orchids\DemoKit\Http\Screens\Step2\DemokitStep2Edit;
use Orchids\DemoKit\Http\Screens\Step3\DemokitStep3;
use Orchids\DemoKit\Http\Screens\Step3\DemokitStep3List;
use Orchids\DemoKit\Http\Screens\Step4\DemokitStep4List;
use Orchids\DemoKit\Http\Screens\Step5\DemokitStep5;



Route::domain((string) config('platform.domain'))
    ->prefix(Dashboard::prefix('/demokit'))
    ->middleware(config('platform.middleware.private'))
    ->namespace('Orchids\DemoKit\Http\Screens')
    ->group(function (\Illuminate\Routing\Router $router, $path='platform.demokit.') {
        $router->screen('step2/{postscreen}/edit', DemokitStep2Edit::class)->name($path.'step2.edit');
        $router->screen('step2/create', DemokitStep2Edit::class)->name($path.'step2.create');
        $router->screen('step4', DemokitStep4List::class)->name($path.'step4.list');

        $router->screen('step1', DemokitStep1::class)->name($path.'step1');

        $router->screen('step3/{step3}/column', DemokitStep3::class)->name($path.'step3');
        $router->screen('step3', DemokitStep3List::class)->name($path.'step3.list');

        $router->screen('step5', DemokitStep5::class)->name($path.'step5');

    });


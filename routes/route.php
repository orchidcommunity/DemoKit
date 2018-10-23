<?php


Route::domain((string) config('platform.domain'))
    ->prefix(Dashboard::prefix('/demokit'))
    ->middleware(config('platform.middleware.private'))
    ->namespace('Orchids\DemoKit\Http\Screens')
    ->group(function (\Illuminate\Routing\Router $router, $path='platform.demokit.') {
        $router->screen('step2/{postscreen}/edit', 'Step2\DemokitStep2Edit',$path.'step2.edit');
        $router->screen('step2/create', 'Step2\DemokitStep2Edit',$path.'step2.create');
        $router->screen('step4', 'Step4\DemokitStep4List',$path.'step4.list');

        $router->screen('step1', 'Step1\DemokitStep1',$path.'step1');

        $router->screen('step3/{step3}/column', 'Step3\DemokitStep3',$path.'step3');
        $router->screen('step3', 'Step3\DemokitStep3List',$path.'step3.list');

        $router->screen('step5', 'Step5\DemokitStep5',$path.'step5');

    });


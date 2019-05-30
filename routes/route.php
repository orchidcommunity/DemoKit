<?php
use Orchids\DemoKit\Http\Screens\Step1\DemokitStep1;
//***use App\Http\Screens\Step1\DemokitStep1;
use Orchids\DemoKit\Http\Screens\Step2\DemokitStep2Edit;
use Orchids\DemoKit\Http\Screens\Step3\DemokitStep3List;
use Orchids\DemoKit\Http\Screens\Step4\DemokitStep4;
use Orchids\DemoKit\Http\Screens\Step4\DemokitStep4List;
use Orchids\DemoKit\Http\Screens\Step5\DemokitStep5;
use Orchids\DemoKit\Http\Screens\Step6\DemokitStep6;

$this->router->screen('demokit/step1', DemokitStep1::class)->name('platform.demokit.step1');

$this->router->screen('demokit/step2/{demokitpost}/edit', DemokitStep2Edit::class)->name('platform.demokit.step2.edit');
$this->router->screen('demokit/step2/create', DemokitStep2Edit::class)->name('platform.demokit.step2.create');
$this->router->screen('demokit/step3', DemokitStep3List::class)->name('platform.demokit.step3.list');

$this->router->screen('demokit/step4/{step4}/column', DemokitStep4::class)->name('platform.demokit.step4');
$this->router->get('demokit/step4/{demokitpost}/remove', [DemokitStep2Edit::class,'remove'])->name('platform.demokit.step4.remove');
$this->router->screen('demokit/step4', DemokitStep4List::class)->name('platform.demokit.step4.list');

$this->router->screen('demokit/step5', DemokitStep5::class)->name('platform.demokit.step5');

$this->router->screen('demokit/step6', DemokitStep6::class)->name('platform.demokit.step6');
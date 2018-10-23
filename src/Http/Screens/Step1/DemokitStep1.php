<?php
namespace Orchids\DemoKit\Http\Screens\Step1;

use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Setting;
use Orchid\Screen\Layouts;
use Orchid\Screen\Link;
use Orchid\Screen\Screen;

//use Orchids\DemoKit\Models\DemoPost;
use Orchids\DemoKit\Http\Layouts\Pages\IconsLayout;
use Orchids\DemoKit\Http\Layouts\Modals\HelpModalLayout;

class DemokitStep1 extends Screen
{
    /**
     * Display header name
     *
     * @var string
     */
    public $name = 'Step 1 - Icon collection';
    /**
     * Display header description
     *
     * @var string
     */
    public $description = 'Orchid Icon collection';
    /**
     * Query data
     *
     *
     * @return array
     */
    public function query() : array
    {
        return [
            'helpmdpath'  => DEMOKIT_PATH.'/docs/ru/step1.md',
        ];
    }
    /**
     * Button commands
     *
     * @return array
     */
    public function commandBar() : array
    {
        return [				
            Link::name('Help Step 1')
                ->modal('HelpModal')
                ->id('hello'),
        ];
    }
    /**
     * Views
     *
     * @return array
     */
    public function layout() : array
    {
        return [
            //IconsLayout::class,
            Layouts::view('orchids/demokit::layouts.icons'),
            Layouts::modals([
                'HelpModal' => [
                    HelpModalLayout::class,
                ],
            ])->class('modal-lg'),
        ];
    }

}
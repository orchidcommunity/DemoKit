<?php

namespace Orchids\DemoKit\Http\Screens\Screen3;

use Illuminate\Support\Facades\Artisan;
use Orchid\Screen\Screen;
use Orchid\Screen\Layouts;
use Orchid\Screen\Link;

use Orchids\DemoKit\Models\DemoPost;
use Orchids\DemoKit\Http\Layouts\Lists\DemoScreen3Layout;
use Orchids\DemoKit\Http\Layouts\Modals\HelpModalLayout;

class DemoScreen3List extends Screen
{
    /**
     * Display header name
     *
     * @var string
     */
    public $name = 'Screen3 List';
    /**
     * Display header description
     *
     * @var string
     */
    public $description = 'List all data screen1';
    /**
     * Query data
     *
     * @return array
     */
    public function query() : array
    {
        //dd(DemoPost::paginate(30));
         return [
            'data' => DemoPost::paginate(30),
            'helpmdpath'  => DEMOKIT_PATH.'/docs/ru/step3.md',
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
            Link::name('Help Step 3')
                ->modal('HelpModal'),
            //Link::name('Create a new data')->method('create'),
            //Link::name('Add 1 row demo')->method('add1_demo'),
            //Link::name('Add 10 row demo')->method('add10_demo'),
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
            DemoScreen3Layout::class,
            Layouts::modals([
                'HelpModal' => [
                    HelpModalLayout::class,
                ],
            ])->class('modal-lg'),
        ];
    }
}

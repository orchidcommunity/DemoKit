<?php
namespace Orchids\DemoKit\Http\Screens\Screen3;

use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Setting;
use Orchid\Screen\Layouts;
use Orchid\Screen\Link;
use Orchid\Screen\Screen;

use Orchids\DemoKit\Models\DemoPost;
use Orchids\DemoKit\Http\Layouts\Pages\HeadingsLayout;
use Orchids\DemoKit\Http\Layouts\Pages\TextElementsLayout;
use Orchids\DemoKit\Http\Layouts\Pages\TextColorsLayout;
use Orchids\DemoKit\Http\Layouts\Pages\TextListsLayout;
use Orchids\DemoKit\Http\Layouts\Pages\TextAlignsLayout;



class DemoScreen3Edit extends Screen
{
	
    /**
     * Display header name
     *
     * @var string
     */
    public $name = 'Экран типографий';
    /**
     * Display header description
     *
     * @var string
     */
    public $description = 'Данные генерятся из постов, можно выбрать разное положение макетов';


    public $method;

    /**
     * Query data
     *
     * @param XSetting $xsetting
     *
     * @return array
     */


    public function query($demokitdata= null) : array
    {

        $demokitdata = is_null($demokitdata) ? new DemoPost() : DemoPost::whereId($demokitdata)->first();
        //dd($demokitdata);
        return [
            'data'   => $demokitdata,
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
            Link::name('Макеты')
                ->icon('icon-user')
                ->group([
                    Link::name('OneColumn')->link('OneColumn')->icon('icon-user'),
                    Link::name('TwoColumn')->link('TwoColumn')->icon('icon-user'),
                    Link::name('TabColumn')->link('TabColumn')->icon('icon-user'),
                    Link::name('DivColumn')->link('DivColumn')->icon('icon-user'),
                ])

        ];
    }
    /**
     * Views
     *
     * @return array
     */
    public function layout() : array
    {
        /*
        $template = function ($template)
        {
            return view('orchids/demokit::layouts.'.$template);
        };
*/
        //dump($this->method);
        $Layout = [
            'OneColumn' => [
                //Layouts::view('orchids/demokit::layouts.headings'),
                //serialize(view('orchids/demokit::layouts.headings')),
                //serialize($template('headings')),
                HeadingsLayout::class,
                TextElementsLayout::class,
                TextColorsLayout::class,
                TextListsLayout::class,
                TextAlignsLayout::class,
            ],
            'TwoColumn' => [
                Layouts::columns([
                    'First Column' => [
                        HeadingsLayout::class,
                        TextElementsLayout::class,
                    ],
                    'Second Column' => [
                        TextColorsLayout::class,
                        TextListsLayout::class,
                        TextAlignsLayout::class,
                    ],
                ]),
            ],
            'TabColumn' => [
                Layouts::tabs([
                    'Headings' => [HeadingsLayout::class],
                    'Elements' => [TextElementsLayout::class],
                    'Colors'   => [TextColorsLayout::class],
                    'Lists'    => [TextListsLayout::class],
                    'Aligns'   => [TextAlignsLayout::class],
                ]),
            ],
            'DivColumn' => [
                Layouts::blank([
                    'Columns' => [
                        Layouts::blank([
                            'First Column'   => [
                                TextColorsLayout::class,
                                TextListsLayout::class,
                                TextAlignsLayout::class
                            ],
                        ])->class('col-7 border-right'),
                        Layouts::blank([
                            'Second Column' => [
                                HeadingsLayout::class,
                                TextElementsLayout::class
                            ],
                        ])->class('col-5 no-gutter')
                    ]
                ])->class('row')
            ],
        ];

        /*
                return [

                    Layouts::columns([
                        'HeadingsLayout' => [
                            HeadingsLayout::class,
                            TextElementsLayout::class,
                            TextElementsLayout::class
                        ],
                        'TextElementsLayout' => [
                            TextElementsLayout::class
                        ],
                    ]),

                ];
        */
        //dd($this->method);

        return $Layout[$this->method ?? 'OneColumn'];
    }

/*

    public function OneColumn()
    {
        $this->method='OneColumn';
    }
    public function TwoColumn()
    {
        $this->method='TwoColumn';
    }
    public function TabColumn()
    {
        $this->method='TabColumn';
    }
    public function DivColumn()
    {
        $this->method='DivColumn';
    }
*/

    /**
     * @param null $method
     * @param null $parameters
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \ReflectionException
     * @throws \Throwable
     */

    public function handle(...$parameters)
    {
        $this->method=$parameters[1];

        return parent::handle($parameters);
    }


}
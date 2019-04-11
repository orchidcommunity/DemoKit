<?php
namespace Orchids\DemoKit\Http\Screens\Step3;

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



class DemokitStep3 extends Screen
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
     * @param $demokitdata
     *
     * @return array
     */


    public function query($demokitdata= null) : array
    {

        $demokitdata = is_null($demokitdata) ? new DemoPost() : DemoPost::whereId($demokitdata)->first();
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
                Layouts::wrapper('orchids/demokit::container.layouts.wrapper', [
                    'left' => [
                        TextColorsLayout::class,
                        TextListsLayout::class,
                        TextAlignsLayout::class
                    ],

                    'right' => [
                        HeadingsLayout::class,
                        TextElementsLayout::class
                    ],

                ]),
                ],
        ];

        return $Layout[$this->method ?? 'OneColumn'];
    }

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
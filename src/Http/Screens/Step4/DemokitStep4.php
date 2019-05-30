<?php
namespace Orchids\DemoKit\Http\Screens\Step4;

use Orchid\Screen\Layout;
use Orchid\Screen\Link;
use Orchid\Screen\Screen;

use Orchids\DemoKit\Models\DemoPost;
use Orchids\DemoKit\Http\Layouts\Pages\HeadingsLayout;
use Orchids\DemoKit\Http\Layouts\Pages\TextElementsLayout;
use Orchids\DemoKit\Http\Layouts\Pages\TextColorsLayout;
use Orchids\DemoKit\Http\Layouts\Pages\TextListsLayout;
use Orchids\DemoKit\Http\Layouts\Pages\TextAlignsLayout;



class DemokitStep4 extends Screen
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
     * @param $demokitPost
     *
     * @return array
     */


    public function query($demokitPost= null) : array
    {
        $demokitPost = is_null($demokitPost) ? new DemoPost() : DemoPost::whereId($demokitPost)->first();
        return [
            'data'   => $demokitPost,
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
                ->icon('icon-docs')
                ->group([
                    Link::name('OneColumn')->link('OneColumn')->icon('icon-doc'),
                    Link::name('TwoColumn')->link('TwoColumn')->icon('icon-doc'),
                    Link::name('TabColumn')->link('TabColumn')->icon('icon-doc'),
                    Link::name('WrapperColumn')->link('WrapperColumn')->icon('icon-doc'),
                    Link::name('AccordionColumn')->link('AccordionColumn')->icon('icon-doc'),
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
                HeadingsLayout::class,
                TextElementsLayout::class,
                TextColorsLayout::class,
                TextListsLayout::class,
                TextAlignsLayout::class,
            ],
            'TwoColumn' => [
                Layout::columns([
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
                Layout::tabs([
                    'Headings' => [HeadingsLayout::class],
                    'Elements' => [TextElementsLayout::class],
                    'Colors'   => [TextColorsLayout::class],
                    'Lists'    => [TextListsLayout::class],
                    'Aligns'   => [TextAlignsLayout::class],
                ]),
            ],
            'WrapperColumn' => [
                Layout::wrapper('orchids/demokit::container.layouts.wrapper', [
                    'left' => [
                        HeadingsLayout::class,
                        TextListsLayout::class,
                        TextAlignsLayout::class
                    ],

                    'right' => [
                        TextColorsLayout::class,
                        TextElementsLayout::class
                    ],

                ]),
            ],
            'AccordionColumn' => [
                Layout::accordion([
                    'Headings' => [HeadingsLayout::class],
                    'Elements' => [TextElementsLayout::class],
                    'Colors'   => [TextColorsLayout::class],
                    'Lists'    => [TextListsLayout::class],
                    'Aligns'   => [TextAlignsLayout::class],
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
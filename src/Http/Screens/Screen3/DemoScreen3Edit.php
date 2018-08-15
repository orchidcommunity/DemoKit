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
            Link::name('OneColumn')->link('OneColumn'),
            Link::name('TwoColumn')->link('TwoColumn'),
            Link::name('TabColumn')->link('TabColumn'),
            Link::name('DivColumn')->link('DivColumn'),
        ];
    }
    /**
     * Views
     *
     * @return array
     */
    public function layout() : array
    {
        dump($this->method);
        $Layout = [
            'OneColumn' => [
                Layouts::blank([
                    'HeadingsLayout' => [
                        HeadingsLayout::class,
                        TextElementsLayout::class,
                        TextColorsLayout::class,
                        TextListsLayout::class,
                        TextAlignsLayout::class,
                    ],
                ])
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
                Layouts::div([
                    'Columns' => [
                        Layouts::div([
                            'First Column'   => [
                                TextColorsLayout::class,
                                TextListsLayout::class,
                                TextAlignsLayout::class
                            ],
                        ])->class('col-7 border-right'),
                        Layouts::div([
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
        //dd($Layout);
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

    public function handle($method = null, $parameters = null)
    {
        $this->method=$parameters;
        abort_if(! $this->checkAccess(), 403);

        if ($this->request->method() === 'GET' || (is_null($method) && is_null($parameters))) {
            $this->arguments = is_array($method) ? $method : [$method];

            return $this->view();
        }

        if (starts_with($method, 'async')) {
            return $this->asyncBuild($method, $parameters);
        }

        if (! is_null($parameters)) {
            $this->arguments = is_array($method) ? $method : [$method];

            $this->reflectionParams($parameters);

            return call_user_func_array([$this, $parameters], $this->arguments);
        }

        $this->arguments = is_array($parameters) ? $parameters : [$parameters];
        $this->reflectionParams($method);

        return call_user_func_array([$this, $method], $this->arguments);
    }

    /**
     * @return bool
     */

    private function checkAccess()
    {
        if (is_null($this->permission)) {
            return true;
        }

        if (is_string($this->permission)) {
            $this->permission = [$this->permission];
        }

        if (is_array($this->permission)) {
            foreach ($this->permission as $item) {
                if (! Auth::user()->hasAccess($item)) {
                    return false;
                }
            }
        }

        return true;
    }

}
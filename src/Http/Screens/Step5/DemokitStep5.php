<?php

namespace Orchids\DemoKit\Http\Screens\Step5;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Link;
use Orchid\Screen\Field;
use Orchid\Screen\Screen;
use Orchid\Screen\Layout;
use Orchid\Screen\Layouts\Modals;
use Orchid\Screen\Repository;
use Orchid\Support\Facades\Alert;
use Orchids\DemoKit\Http\Layouts\Step5\RowExample;
use Orchids\DemoKit\Http\Layouts\Step5\TableExample;
use Orchids\DemoKit\Http\Layouts\Step5\MetricsExample;
use Orchids\DemoKit\Http\Layouts\Step5\ChartBarExample;
use Orchids\DemoKit\Http\Layouts\Step5\ChartPieExample;
use Orchids\DemoKit\Http\Layouts\Step5\ChartLineExample;
use Orchids\DemoKit\Http\Layouts\Modals\HelpModalLayout;

class DemokitStep5 extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Example Screen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Sample Screen Components';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'charts'  => [
                [
                    'label'   => 'Some Data',
                    'data' => [25, 40, 30, 35, 8, 52, 17],
                ],
                [
                    'label'   => 'Another Set',
                    'data' => [25, 50, -10, 15, 18, 32, 27],
                ],
                [
                    'label'   => 'Yet Another',
                    'data' => [15, 20, -3, -15, 58, 12, -17],
                ],
                [
                    'label'   => 'And Last',
                    'data' => [10, 33, -8, -3, 70, 20, -34],
                ],
            ],
            'table'   => [
                new Repository(['product_id' => 'prod-100', 'name' => 'Desk', 'price' => 10.24, 'created_at' => '01.01.2020']),
                new Repository(['product_id' => 'prod-200', 'name' => 'Chair', 'price' => 65.9, 'created_at' => '01.01.2020']),
                new Repository(['product_id' => 'prod-300', 'name' => 'Computer', 'price' => 754.2, 'created_at' => '01.01.2020']),
                new Repository(['product_id' => 'prod-400', 'name' => 'Pen', 'price' => 0.1, 'created_at' => '01.01.2020']),
                new Repository(['product_id' => 'prod-400', 'name' => 'Brush', 'price' => 0.15, 'created_at' => '01.01.2020']),

            ],
            'metrics' => [
                ['keyValue' => number_format(6851, 0), 'keyDiff' => 10.08],
                ['keyValue' => number_format(24668, 0), 'keyDiff' => -30.76],
                ['keyValue' => number_format(65661, 2), 'keyDiff' => 3.84],
                ['keyValue' => number_format(10000, 0), 'keyDiff' => -169.54],
                ['keyValue' => number_format(1454887.12, 2), 'keyDiff' => 0.2],
            ],
            'helpmdpath'  => DEMOKIT_PATH.'/docs/ru/step5.md',
        ];
    }

    /**
     * Button commands.
     *
     * @return array
     */
    public function commandBar(): array
    {
        return [

            Link::name('Help Step 5')
                ->modal('HelpModal'),


            Link::name('Example Button')
                ->method('example')
                ->icon('icon-bag'),

            Link::name('Example Modals')
                ->modal('exampleModal')
                ->title('Example Modals')
                ->icon('icon-full-screen'),

           Link::name('Example Group Button')
                ->icon('icon-folder-alt')
                ->group([
                    Link::name('Example Button')
                        ->method('example')
                        ->icon('icon-bag'),
                    Link::name('Example Button')
                        ->method('example')
                        ->icon('icon-bag'),
                    Link::name('Example Button')
                        ->method('example')
                        ->icon('icon-bag'),
                    Link::name('Example Button')
                        ->method('example')
                        ->icon('icon-bag'),
                    Link::name('Example Button')
                        ->method('example')
                        ->icon('icon-bag'),
                ]),

        ];
    }

    /**
     * Views.
     *
     * @return array
     * @throws \Throwable
     */
    public function layout(): array
    {
        return [

            MetricsExample::class,
            ChartLineExample::class,

            Layout::columns([
                ChartPieExample::class,
                ChartBarExample::class,
            ]),

            Layout::tabs([
                'Example Tab Table' => TableExample::class,
                'Example Tab Rows'  => RowExample::class,
            ]),

            Layout::modals([
                'exampleModal' => Layout::rows([
                    Input::make('user.password')
                        ->type('test')
                        ->title(__('Example'))
                        ->placeholder(__('Example')),
                ] ),
            ]),
            Layout::modals([
                'HelpModal' => [
                    HelpModalLayout::class,
                ],
            ])->size(Modals::SIZE_LG),

        ];
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function example()
    {
        Alert::warning('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel vulputate mi.');

        return back();
    }
}


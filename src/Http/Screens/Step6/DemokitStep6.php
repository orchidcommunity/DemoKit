<?php

namespace Orchids\DemoKit\Http\Screens\Step6;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Link;
use Orchid\Screen\Field;
use Orchid\Screen\Screen;
use Orchid\Screen\Layout;
use Orchid\Screen\Layouts\Modals;
use Orchid\Screen\Repository;
use Orchid\Support\Facades\Alert;
use Orchids\DemoKit\Http\Layouts\Step6\Step6Layout;


class DemokitStep6 extends Screen
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
            Step6Layout::class,
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


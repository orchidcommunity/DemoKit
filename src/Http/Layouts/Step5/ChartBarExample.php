<?php

namespace Orchids\DemoKit\Http\Layouts\Step5;

use Orchid\Screen\Layouts\Chart;

class ChartBarExample extends Chart
{
    /**
     * @var string
     */
    public $title = 'Bar Chart';

    /**
     * @var int
     */
    public $height = 250;

    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'.
     *
     * @var string
     */
    public $type = 'bar';

    /**
     * @var array
     */
    public $labels = [
        '12am-3am',
        '3am-6am',
        '6am-9am',
        '9am-12pm',
        '12pm-3pm',
        '3pm-6pm',
        '6pm-9pm',
    ];

    /**
     * @var string
     */
    public $data = 'charts';

    public $options = [
        'title' => [
            'display' => true,
            'text'    => 'Bar Chart',
        ],
        'layout' => [
            'padding' => [
                'right' => 10,
            ]
        ],
        'legend' => [
            'display'  => true,
            'position' => 'right',
            'labels'   => [
                'fontSize' =>8,
            ]
        ],
    ];
}

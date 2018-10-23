<?php

namespace  Orchids\DemoKit\Http\Layouts\Step5;

use Orchid\Screen\Layouts\Metric;

class MetricsExample extends Metric
{
    /**
     * @var string
     */
    public $title = 'Metric Today';

    /**
     * @var array
     */
    public $data = 'metrics';

    /**
     * @var array
     */
    public $labels = [
        'Sales Today',
        'Visitors Today',
        'Total Earnings',
        'Pending Orders',
        'Total Revenue',
    ];
}

<?php

namespace Orchids\DemoKit\Http\Layouts\Step5;

use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;

class TableExample extends Table
{
    /**
     * @var string
     */
    public $data = 'table';

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            TD::set('product_id', 'ID'),
            TD::set('name', 'Name'),
            TD::set('price', 'Price')->render(function ($model) {
                return '$ '.number_format($model->get('price'), 2);
            }),
            TD::set('created_at', 'Created'),
        ];
    }
}

<?php
namespace Orchids\DemoKit\Http\Layouts\Lists;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\TD;

class DemoScreen1Layout extends Table
{
    /**
     * @var string
     */
    public $data = 'data';
    /**
     * @return array
     */
    public function fields() : array
    {
        return  [

			TD::set('input','Title')
                //->linkPost('platform.demokit.screen1.edit'),
                ->link('platform.demokit.screen1.edit','id','input'),
			TD::set('phone', 'Phone')
                ->link('platform.demokit.screen1.edit','id','phone'),

        ];
    }
}
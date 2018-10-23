<?php
namespace Orchids\DemoKit\Http\Layouts\Lists;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class DemokitStep4Layout extends Table
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
                ->link('platform.demokit.step2.edit','id','input'),
			TD::set('phone', 'Phone')
                ->link('platform.demokit.step2.edit','id','phone'),

        ];
    }
}
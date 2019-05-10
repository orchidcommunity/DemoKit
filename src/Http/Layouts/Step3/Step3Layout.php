<?php
namespace Orchids\DemoKit\Http\Layouts\Step3;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class Step3Layout extends Table
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
            TD::set('id', 'ID')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->filter('numeric')
                ->sort()
                ->link('platform.demokit.step2.edit','id'),
            TD::set('slug','Slug')
                ->sort()
                ->filter('text')
                ->link('platform.demokit.step2.edit','id','slug'),
			TD::set('input','Title')
                ->link('platform.demokit.step2.edit','id','input'),
        ];
    }
}
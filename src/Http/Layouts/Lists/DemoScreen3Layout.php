<?php
namespace Orchids\DemoKit\Http\Layouts\Lists;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class DemoScreen3Layout extends Table
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
                //->linkPost('platform.demokit.screen1.edit')

                ->setRender(function ($data) {
                    //dump($data->getContent('content')[app()->getLocale()]['input']);
                    return '<a href="' . route('platform.demokit.screen3.edit',
                            [$data->id,'OneColumn']) . '">' . $data->getContent('content')[app()->getLocale()]['input'] . '</a>';
                }),
                //->link('platform.demokit.screen3.edit',['id','OneColumn'],'input'),
			TD::set('phone', 'Phone')
                ->link('platform.demokit.screen3.edit','id','phone'),

        ];
    }
}
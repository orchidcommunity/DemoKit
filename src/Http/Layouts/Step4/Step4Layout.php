<?php
namespace Orchids\DemoKit\Http\Layouts\Step4;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class Step4Layout extends Table
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

                ->Render(function ($data) {
                    //dump($data->getContent('content')[app()->getLocale()]['input']);
                    return '<a href="' . route('platform.demokit.step4',
                            [$data->id,'OneColumn']) . '">' . $data->getContent('content')[app()->getLocale()]['input'] . '</a>';
                }),
                //->link('platform.demokit.screen3.edit',['id','OneColumn'],'input'),
			TD::set('phone', 'Phone')
                ->link('platform.demokit.step4','id','phone'),

        ];
    }
}
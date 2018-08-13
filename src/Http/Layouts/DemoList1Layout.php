<?php
namespace Orchids\DemoKit\Http\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\TD;

class DemoList1Layout extends Table
{
    /**
     * @var string
     */
    public $data = 'settings';
    /**
     * @return array
     */
    public function fields() : array
    {
        return  [

			TD::set('key','Key')
                ->link('platform.xsetting.edit','key','key'),
			TD::set('options.title', 'Name')
				->setRender(function ($xsetting) {
                return $xsetting->options['title'];
				}),
            TD::set('value','Value')
                ->setRender(function ($xsetting) {
                     if (is_array($xsetting->value)) {
                        return str_limit(htmlspecialchars(json_encode($xsetting->value)), 50);
                     }
                     return str_limit(htmlspecialchars($xsetting->value), 50);
				}),


        ];
    }
}
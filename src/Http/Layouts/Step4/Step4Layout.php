<?php       //---
namespace Orchids\DemoKit\Http\Layouts\Step4;       //---
//---
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
                ->Render(function ($data) {
                    return '<a href="' . route('platform.demokit.step4',
                            [$data->id,'OneColumn']) . '">' . $data->getContent('content')[app()->getLocale()]['input'] . '</a>
                            <a href="' . route('platform.demokit.step4',
                            [$data->id,'TwoColumn']) . '" class="text-success invis" data-toggle="tooltip" data-placement="top" title="Макет в 2 столбца"> <i class="icons icon-grid"></i></a>
                            <a href="' . route('platform.demokit.step4',
                            [$data->id,'TabColumn']) . '" class="text-success invis" data-toggle="tooltip" data-placement="top" title="Макет табы"> <i class="icons icon-browser"></i></a>
                            <a href="' . route('platform.demokit.step4',
                            [$data->id,'AccordionColumn']) . '" class="text-success invis" data-toggle="tooltip" data-placement="top" title="Макет аккордеон"> <i class="icons icon-task"></i></a>
                            <a href="' . route('platform.demokit.step4.remove',
                            [$data->id]) . '" class="text-success invis" data-toggle="tooltip" data-placement="top" title="Удалить"> <i class="icons icon-trash"></i> </a>';
                }),
			TD::set('phone', 'Phone')
                ->link('platform.demokit.step4','id','phone'),

        ];
    }
}
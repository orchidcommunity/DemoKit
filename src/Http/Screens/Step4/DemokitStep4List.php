<?php      //---

namespace Orchids\DemoKit\Http\Screens\Step4;      //---

use Orchid\Screen\Screen;
use Orchid\Screen\Layout;
use Orchid\Screen\Layouts\Modals;
use Orchid\Screen\Link;
use Orchid\Press\Models\Post;

//use Orchids\DemoKit\Models\DemoPost;      //---
use Orchids\DemoKit\Http\Layouts\Step4\Step4Layout;
use Orchids\DemoKit\Http\Layouts\Modals\HelpModalLayout;      //---

class DemokitStep4List extends Screen
{
    /**
     * Display header name
     *
     * @var string
     */
    public $name = 'Step4 List';
    /**
     * Display header description
     *
     * @var string
     */
    public $description = 'List all data screen';
    /**
     * Query data
     *
     * @return array
     */
    public function query() : array
    {
         return [
            'data' => Post::where('type','demo-screen')->paginate(30),
            'helpmdpath'  => DEMOKIT_PATH.'/docs/ru/step4.md',      //---
        ];
    }
    /**
     * Button commands
     *
     * @return array
     */
    public function commandBar() : array
    {
        return [
            Link::name('Help Step 4')      //---
                ->modal('HelpModal'),      //---
        ];
    }
    /**
     * Views
     *
     * @return array
     */
    public function layout() : array
    {
        return [
            Step4Layout::class,
            Layout::modals([                    //---
                'HelpModal' => [                //---
                    HelpModalLayout::class,     //---
                ],                              //---
        ])                                      //---
            ->size(Modals::SIZE_LG),      //---
        ];
    }
}

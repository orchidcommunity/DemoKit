<?php

namespace Orchids\DemoKit\Http\Screens\Step3;

use Illuminate\Support\Facades\Artisan;
use Orchid\Screen\Screen;
use Orchid\Screen\Layout;
use Orchid\Screen\Layouts\Modals;
use Orchid\Screen\Link;
use Orchid\Press\Models\Post;
use Orchids\DemoKit\Http\Layouts\Step3\Step3Layout;

//use Orchids\DemoKit\Models\DemoPost;
use Orchids\DemoKit\Http\Layouts\Modals\HelpModalLayout;

class DemokitStep3List extends Screen
{
    /**
     * Display header name
     *
     * @var string
     */
    public $name = 'Step3 List data';
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
            'data' => Post::where('type','demo-screen')->filters()->defaultSort('id')->paginate(30),
            'helpmdpath'  => DEMOKIT_PATH.'/docs/ru/step3.md',
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
            Link::name('Help step 3')->icon('icon-question')->modal('HelpModal'),
            //Link::name('Add 10 row demo')->method('add10_demo'),
            Link::name('Add 1 row demo')->icon(' icon-plus')->method('add1_demo'),
            Link::name('Add data')->icon(' icon-plus')->method('create'),
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
            Step3Layout::class,
            Layout::modals([
                'HelpModal' => [
                    HelpModalLayout::class,
                ],
            ])->size(Modals::SIZE_LG),
        ];
    }

    /**
     * @return null
     */
     public function create()
    {
        return redirect()->route('platform.demokit.step2.create');
    }

    /**
     * @return null
     */
    public function add1_demo()
    {
        Artisan::call("db:seed", ['--class' => "Orchids\DemoKit\Database\Seeds\Add1DemoPostsTableSeeder"]);
        return back();
    }

    /**
     * @return null
     */
    public function add10_demo()
    {
        Artisan::call("db:seed", ['--class' => "Orchids\DemoKit\Database\Seeds\Add10DemoPostsTableSeeder"]);
        return back();
    }
}
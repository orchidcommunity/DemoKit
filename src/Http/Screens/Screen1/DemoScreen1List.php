<?php

namespace Orchids\DemoKit\Http\Screens\Screen1;

use Illuminate\Support\Facades\Artisan;
use Orchid\Screen\Screen;
use Orchid\Screen\Layouts;
use Orchid\Screen\Link;

use Orchids\DemoKit\Models\DemoPost;
use Orchids\DemoKit\Http\Layouts\Lists\DemoScreen1Layout;
use Orchids\DemoKit\Http\Layouts\Modals\HelpModalLayout;
//use Orchids\DemoKit\Database\Seeds\Add1DemoPostsTableSeeder;

class DemoScreen1List extends Screen
{
    /**
     * Display header name
     *
     * @var string
     */
    public $name = 'Screen1 List';
    /**
     * Display header description
     *
     * @var string
     */
    public $description = 'List all data screen1';
    /**
     * Query data
     *
     * @return array
     */
    public function query() : array
    {
        //DEMOKIT_PATH
         return [
            'data' => DemoPost::paginate(30),
            'helpmdpath'  => PLATFORM_PATH.'/docs/ru/screens.md',
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
            Link::name('Create a new data')->method('create'),
            Link::name('Add 1 row demo')->method('add1_demo'),
            //Link::name('Add 10 row demo')->method('add10_demo'),
            Link::name('Help')
                ->modal('HelpModal'),
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
            DemoScreen1Layout::class,
            Layouts::modals([
                'HelpModal' => [
                    HelpModalLayout::class,
                ],
            ])->class('modal-lg'),
        ];
    }
    /**
     * @return null
     */
     public function create()
    {
        return redirect()->route('platform.screens.screens1.create');
    }

    /**
     * @return null
     */
    public function add1_demo()
    {
        //php artisan db:seed --class="Orchids\DemoKit\Database\Seeds\Add1DemoPostsTableSeeder"
        //$this->call(Add1DemoPostsTableSeeder::class);
        //Artisan::queue('backup:run');
        Artisan::call("db:seed", ['--class' => "Orchids\DemoKit\Database\Seeds\Add1DemoPostsTableSeeder"]);
        return back();
    }

    /**
     * @return null
     */
    public function add10_demo()
    {
        //php artisan db:seed --class="Orchids\DemoKit\Database\Seeds\Add1DemoPostsTableSeeder"
        //$this->call(Add1DemoPostsTableSeeder::class);
        //Artisan::queue('backup:run');
        Artisan::call("db:seed", ['--class' => "Orchids\DemoKit\Database\Seeds\Add10DemoPostsTableSeeder"]);
        return back();
    }

}

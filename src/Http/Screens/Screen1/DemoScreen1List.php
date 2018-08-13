<?php

namespace Orchids\DemoKit\Http\Screens\Screen1;


use Orchid\Press\Models\Post;
use Orchids\DemoKit\Models\DemoPost;
use Orchid\Screen\Screen;
use Orchid\Screen\Layouts;
use Orchid\Screen\Link;

use Orchids\DemoKit\Http\Layouts\Lists\DemoScreen1Layout;

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
        //dd(DemoPost::paginate(30));
         return [
            'data' => DemoPost::paginate(30)
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
        ];
    }
    /**
     * @return null
     */
     public function create()
    {
        return redirect()->route('platform.screens.screens1.create');
    }
}
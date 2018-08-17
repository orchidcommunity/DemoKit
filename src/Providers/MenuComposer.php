<?php

namespace Orchids\DemoKit\Providers;

use Orchid\Platform\Dashboard;

class MenuComposer
{
    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
		//$this->menu = $dashboard->menu;
    }

    /**
     *
     */
    public function compose()
    {
        $this->dashboard->menu
            ->add('Main', [
                'slug'       => 'demokit-screens',
                'icon'       => 'icon-notebook',
                'route'      => '#',
                'label'      => 'Screens',
                'childs'     => true,
                'main'       => true,
                'active'     => 'platform.demokit.*',
                'permission' => 'platform.demokit',
                'sort'       => 300,
            ]);
        $this->dashboard->menu
            ->add('demokit-screens', [
                'slug'       => 'demokit-screen2',
                'icon'       => 'icon-notebook',
                'route'      => route('platform.demokit.screen2.edit'),
                'label'      => 'Step 1 - Icon Screen',
                'groupname'  => 'Screens',
                'childs'     => false,
                'main'       => false,
                /*'active'     => 'platform.demokit.*',*/
                'permission' => 'platform.demokit',
                'sort'       => 10,
            ]);
        $this->dashboard->menu
            ->add('demokit-screens', [
                'slug'       => 'demokit-screen1-create',
                'icon'       => 'icon-notebook',
                'route'      => route('platform.demokit.screen1.create'),
                'label'      => 'Step 2 - Screen Create',
                'childs'     => false,
                'main'       => false,
                /*'active'     => 'platform.demokit.*',*/
                'permission' => 'platform.demokit',
                'sort'       => 15,
            ]);
        $this->dashboard->menu
            ->add('demokit-screens', [
                'slug'       => 'demokit-screen3',
                'icon'       => 'icon-notebook',
                'route'      => route('platform.demokit.screen3.list'),
                'label'      => 'Step 3 - Typography',
                'childs'     => false,
                'main'       => false,
                /*'active'     => 'platform.demokit.*',*/
                'permission' => 'platform.demokit',
                'sort'       => 16,
            ]);
        $this->dashboard->menu
            ->add('demokit-screens', [
                'slug'       => 'demokit-screen1',
                'icon'       => 'icon-notebook',
                'route'      => route('platform.demokit.screen1.list'),
                'label'      => 'Step 4 - Screens',
                'childs'     => false,
                'main'       => false,
                /*'active'     => 'platform.demokit.*',*/
                'permission' => 'platform.demokit',
                'sort'       => 20,
            ]);

/*
        $this->dashboard->menu
            ->add('CMS', [
                'slug'       => 'XSetting',
                'icon'       => 'icon-settings',
                'route'      => route('platform.xsetting.list'),
                'label'      => 'Setting configuration',
                'groupname'  => trans('platform::systems/category.groupname'),
                'active'     => 'platform.systems.*',
                'permission' => 'platform.systems.xsetting',
                'sort'       => 7,
            ]);*/
//dd($this->dashboard);
    }
}
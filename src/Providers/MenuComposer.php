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
                'slug'       => 'demokit-steps',
                'icon'       => 'icon-notebook',
                'route'      => '#',
                'label'      => 'DemoKit',
                'childs'     => true,
                'main'       => true,
                'class'      => 'demokit-menu',
                'active'     => 'platform.demokit.*',
                'permission' => 'platform.demokit',
                'sort'       => 300,
            ]);
        $this->dashboard->menu
            ->add('demokit-steps', [
                'slug'       => 'demokit-step1',
                'icon'       => 'icon-notebook',
                'route'      => route('platform.demokit.step1'),
                'label'      => 'Step 1 - Icon Screen',
                'groupname'  => 'Screens',
                'childs'     => false,
                'main'       => false,
                /*'active'     => 'platform.demokit.*',*/
                'permission' => 'platform.demokit',
                'class'      => 'demokit-step1',
                'sort'       => 10,
            ]);
        $this->dashboard->menu
            ->add('demokit-steps', [
                'slug'       => 'demokit-step2',
                'icon'       => 'icon-notebook',
                'route'      => route('platform.demokit.step2.create'),
                'label'      => 'Step 2 - Screen Create',
                'childs'     => false,
                'main'       => false,
                /*'active'     => 'platform.demokit.*',*/
                'permission' => 'platform.demokit',
                'sort'       => 11,
            ]);
        $this->dashboard->menu
            ->add('demokit-steps', [
                'slug'       => 'demokit-step3',
                'icon'       => 'icon-notebook',
                'route'      => route('platform.demokit.step3.list'),
                'label'      => 'Step 3 - Typography',
                'childs'     => false,
                'main'       => false,
                /*'active'     => 'platform.demokit.*',*/
                'permission' => 'platform.demokit',
                'sort'       => 12,
            ]);
        $this->dashboard->menu
            ->add('demokit-steps', [
                'slug'       => 'demokit-step4',
                'icon'       => 'icon-notebook',
                'route'      => route('platform.demokit.step4.list'),
                'label'      => 'Step 4 - Screens',
                'childs'     => false,
                'main'       => false,
                /*'active'     => 'platform.demokit.*',*/
                'permission' => 'platform.demokit',
                'sort'       => 13,
            ]);
        $this->dashboard->menu
            ->add('demokit-steps', [
                'slug'       => 'demokit-step5',
                'icon'       => 'icon-notebook',
                'route'      => route('platform.demokit.step5'),
                'label'      => 'Step 5 - Charts',
                'childs'     => false,
                'main'       => false,
                /*'active'     => 'platform.demokit.*',*/
                'permission' => 'platform.demokit',
                'sort'       => 14,
            ]);
    }
}
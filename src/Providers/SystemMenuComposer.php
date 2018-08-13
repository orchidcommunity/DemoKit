<?php

namespace Orchids\DemoKit\Providers;

use Orchid\Platform\Dashboard;

class SystemMenuComposer
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
            ->add('CMS', [
                'slug'       => 'cms-demokit',
                'icon'       => 'icon-settings',
                'route'      => route('platform.demokit.screen1.list'),
                'label'      => 'Screens',
                'groupname'  => trans('platform::systems/category.groupname'),
                'permission' => 'platform.demokit',
                'sort'       => 8,
            ]);

    }
}
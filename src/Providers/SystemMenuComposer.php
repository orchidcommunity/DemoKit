<?php

namespace Orchids\DemoKit\Providers;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;

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
            ->add('CMS',
                ItemMenu::Label('Demo kit Step4')
                    ->Slug('cms-demokit')
                    ->Icon('icon-settings')
                    ->Route('platform.demokit.step4.list')
                    ->GroupName(trans('platform::systems/category.groupname'))
                    ->Permission('platform.demokit')
                    ->Sort(8)
            );

    }
}
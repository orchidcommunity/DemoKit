<?php

namespace Orchids\DemoKit\Providers;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;

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
            ->add('Main',
                ItemMenu::Label('DemoKit')
                    ->Slug('demokit-steps')
                    ->Icon('icon-notebook')
                    ->Childs(true)
                    ->Active('platform.demokit.*')
                    ->Permission('platform.demokit')
                    ->Sort(300)
            )
            ->add('demokit-steps',
                ItemMenu::Label('Step 1 - Icon Screen')
                    ->Slug('demokit-step1')
                    ->Icon('icon-notebook')
                    ->Route('platform.demokit.step1')
                    ->GroupName('Screens')
                    ->Permission('platform.demokit')
                    ->Sort(10)
            )
            ->add('demokit-steps',
                ItemMenu::Label('Step 2 - Screen Create')
                    ->Slug('demokit-step2')
                    ->Icon('icon-notebook')
                    ->Route('platform.demokit.step2.create')
                    ->Permission('platform.demokit')
                    ->Sort(11)
            )
            ->add('demokit-steps',
                ItemMenu::Label('Step 3 - Typography')
                    ->Slug('demokit-step3')
                    ->Icon('icon-notebook')
                    ->Route( 'platform.demokit.step3.list')
                    ->Permission('platform.demokit')
                    ->Sort(12)
            )
            ->add('demokit-steps',
                ItemMenu::Label('Step 4 - Screens')
                    ->Slug('demokit-step4')
                    ->Icon('icon-notebook')
                    ->Route( 'platform.demokit.step4.list')
                    ->Permission('platform.demokit')
                    ->Sort(13)
            )
            ->add('demokit-steps',
                ItemMenu::Label('Step 5 - Charts')
                    ->Slug('demokit-step5')
                    ->Icon('icon-notebook')
                    ->Route( 'platform.demokit.step5')
                    ->Permission('platform.demokit')
                    ->Sort(14)
            );
    }
}
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
                    ->Sort(300)
                    ->Permission('platform.demokit')
            )
            ->add('demokit-steps',
                ItemMenu::Label(__('Step 1 - Display HTML'))
                    ->Slug('demokit-step1')
                    ->Icon('icon-notebook')
                    ->Route('platform.demokit.step1')
                    ->Title('Screens')
                    ->Sort(10)
                    ->Permission('platform.demokit')
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
                ItemMenu::Label('Step 3 - Screen list')
                    ->Slug('demokit-step3')
                    ->Icon('icon-notebook')
                    ->Route( 'platform.demokit.step3.list')
                    ->Permission('platform.demokit')
                    ->Sort(12)
            )
            ->add('demokit-steps',
                ItemMenu::Label('Step 4 - Typography')
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
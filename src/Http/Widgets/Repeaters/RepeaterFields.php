<?php

namespace Orchids\DemoKit\Http\Widgets\Repeaters;

use Nakukryskin\OrchidRepeaterField\Handlers\RepeaterHandler;
use Orchid\Screen\Fields\InputField;

class RepeaterFields extends RepeaterHandler
{

    /**
     * Return array of the fields
     *
     * @return array
     */
    function fields(): array
    {
        return [
            InputField::make('repeater_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Nested Field'),
            InputField::make('repeater_name1')
                            ->type('text')
                            ->max(255)
                            ->required()
                            ->title('Nested Field 1')
        ];
    }
}
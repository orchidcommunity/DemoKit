<?php
namespace Orchids\DemoKit\Http\Layouts\AllFields;

use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Code;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Tags;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\TinyMCE;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Field;
use Orchid\Screen\Builder;
use Orchid\Screen\Fields\UTM;
use Nakukryskin\OrchidRepeaterField\Repeater;

class DemokitStep2Layout extends Rows
{
    /**
     * @return array
     */
	public function fields(): array
    {
        //dd($this->query->getContent($data_con.'.input'));
        //$postdata->attachment
        //dd($this->query->getContent('data')->attachment);
        $data_con='data.content.'.app()->getLocale();

        return [
            Input::make($data_con.'.input')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Name Articles')
                ->help('Article title'),


            TextArea::make($data_con.'.textarea')
                ->required()
                ->max(255)
                ->rows(5)
                ->title('Short description'),

            TinyMCE::make($data_con.'.body')
                    ->title('Name Articles')
                    ->help('Article title')
                    ->theme('inlite'),
            SimpleMDE::make($data_con.'.markdown')
                    ->title('О чём вы хотите рассказать?'),
                Picture::make($data_con.'.picture')
                    ->width(500)
                    ->height(300),
            Upload::make('data_photos')
                ->modifyValue($this->query->getContent('data')->attachment)
                ->title('Upload'),
            DateTimer::make($data_con.'.datetime')
                ->type('text')
                ->title('Opening date')
                ->help('The opening event will take place'),
            CheckBox::make($data_con.'.checkbox')
                ->value(1)
                ->title('Free')
                ->placeholder('Event for free')
                ->help('Event for free'),
            Code::make($data_con.'.code')
                ->title('Code Block')
                ->help('Simple web editor'),
            Tags::make($data_con.'.tags')
                ->title('Tags')
                ->help('SEO keywords'),
            Select::make($data_con.'.select')
                ->options([
                    'index'   => 'Index',
                    'noindex' => 'No index',
                ])
                ->title('Select tags')
                ->help('Allow search bots to index page'),
           Input::make($data_con.'.phone')
                ->type('text')
                ->mask('(999) 999-9999')
                ->title('Phone')
                ->help('Number Phone'),
            Input::make($data_con.'.phone')
                ->type('text')
                ->mask('(999) 999-9999')
                ->title('Phone')
                ->help('Number Phone'),
            UTM::make($data_con.'.utm')
                ->max(255)
                ->title('Name Articles')
                ->help('Article title'),
/*
            Repeater::make($data_con.'.repeater')
                ->title('Repeater')
                ->handler(\Orchids\DemoKit\Http\Widgets\Repeaters\RepeaterFields::class),
*/
        ];

    }

}
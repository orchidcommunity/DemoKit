<?php
namespace Orchids\DemoKit\Http\Layouts\Step2;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Code;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Press\Screen\Fields\Tags;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\TinyMCE;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\UTM;

class Step2Layout extends Rows
{
    /**
     * @return array
     */
	public function fields(): array
    {
        $data_con='data.content.'.app()->getLocale();

        return [
            Input::make($data_con.'.input')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('String input field'))
                ->help(__('Additional description')),
            TextArea::make($data_con.'.textarea')
                ->required()
                ->max(255)
                ->rows(5)
                ->title(__('Short description')),
            TinyMCE::make($data_con.'.body')
                    ->title(__('Formatted text'))
                    ->theme('inlite'),
            SimpleMDE::make($data_con.'.markdown')
                    ->title(__('Formatted text').' Markdown'),
            Picture::make($data_con.'.picture')
                    ->width(500)
                    ->height(300)
                    ->title(__('Image')),
            Upload::make('data_photos')
                ->modifyValue($this->query->getContent('data')->attachment)
                ->title(__('Upload files')),
            DateTimer::make($data_con.'.datetime')
                ->type('text')
                ->title('Data'),
            CheckBox::make($data_con.'.checkbox')
                ->value(1)
                ->title(__('CheckBox'))
                ->sendTrueOrFalse(),
            Code::make($data_con.'.code')
                ->title('Code Block'),
            Tags::make($data_con.'.tags')
                ->title('Tags'),
            Select::make($data_con.'.select')
                ->options([
                    'index'   => 'Index',
                    'noindex' => 'No index',
                ])
                ->title('Select'),
           Input::make($data_con.'.phone')
                ->type('text')
                ->mask('(999) 999-9999')
                ->title('Phone')
                ->help('Input field with mask'),
            UTM::make($data_con.'.utm')
                ->max(255)
                ->title('UTM field'),
        ];
    }
}
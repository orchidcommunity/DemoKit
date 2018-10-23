<?php
namespace Orchids\DemoKit\Http\Layouts\AllFields;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Field;
use Orchid\Screen\Builder;

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

            Field::tag('input')
                ->type('text')
                ->name($data_con.'.input')
                ->max(255)
                ->required()
                ->title('Name Articles')
                ->help('Article title'),
            Field::tag('textarea')
                ->name($data_con.'.textarea')
                ->required()
                ->max(255)
                ->rows(5)
                ->title('Short description'),

                Field::tag('wysiwyg')
                    ->name($data_con.'.body')
                    ->title('Name Articles')
                    ->help('Article title')
                    ->theme('inlite'),
                Field::tag('markdown')
                    ->name($data_con.'.markdown')
                    ->title('О чём вы хотите рассказать?'),
                Field::tag('picture')
                    ->name($data_con.'.picture')
                    ->width(500)
                    ->height(300),
            Field::tag('upload')
                ->name('data_photos')
                ->modifyValue($this->query->getContent('data')->attachment)
                ->title('Upload'),
            Field::tag('datetime')
                ->type('text')
                ->name($data_con.'.datetime')
                ->title('Opening date')
                ->help('The opening event will take place'),
            Field::tag('checkbox')
                ->name($data_con.'.checkbox')
                ->value(1)
                ->title('Free')
                ->placeholder('Event for free')
                ->help('Event for free'),
            Field::tag('code')
                ->name($data_con.'.code')
                ->title('Code Block')
                ->help('Simple web editor'),
            Field::tag('tags')
                ->name($data_con.'.tags')
                ->title('Tags')
                ->help('SEO keywords'),
            Field::tag('select')
                ->options([
                    'index'   => 'Index',
                    'noindex' => 'No index',
                ])
                ->name($data_con.'.select')
                ->title('Select tags')
                ->help('Allow search bots to index page'),
            Field::tag('input')
                ->type('text')
                ->name($data_con.'.phone')
                ->mask('(999) 999-9999')
                ->title('Phone')
                ->help('Number Phone'),

        ];

    }

}
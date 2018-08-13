<?php
namespace Orchids\DemoKit\Http\Layouts\AllFields;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Field;
use Orchid\Screen\Fields\Builder;

class DemoEdit1Layout extends Rows
{
    /**
     * @return array
     */
	public function fields(): array
    {
        //dd($this->query->getContent('data.content.'.app()->getLocale().'.input'));
        return [
            Field::tag('input')
                ->type('text')
                ->name('data.content.'.app()->getLocale().'.input')
                ->max(255)
                ->required()
                ->title('Name Articles')
                ->help('Article title'),
            Field::tag('textarea')
                ->name('data.content.'.app()->getLocale().'.textarea')
                ->max(255)
                ->rows(5)
                ->title('Short description'),
            Field::tag('wysiwyg')
                ->name('data.content.'.app()->getLocale().'.body')
                ->required()
                ->title('Name Articles')
                ->help('Article title')
                ->theme('inlite'),
            Field::tag('markdown')
                ->name('data.content.'.app()->getLocale().'.markdown')
                ->title('О чём вы хотите рассказать?'),
            Field::tag('picture')
                ->name('data.content.'.app()->getLocale().'.picture')
                ->width(500)
                ->height(300),
            Field::tag('upload')
                ->name('data.content.'.app()->getLocale().'.photos')
                ->title('Upload'),
            Field::tag('datetime')
                ->type('text')
                ->name('data.content.'.app()->getLocale().'.datetime')
                ->title('Opening date')
                ->help('The opening event will take place'),
            Field::tag('checkbox')
                ->name('data.content.'.app()->getLocale().'.checkbox')
                ->value(1)
                ->title('Free')
                ->placeholder('Event for free')
                ->help('Event for free'),
            Field::tag('code')
                ->name('data.content.'.app()->getLocale().'.code')
                ->title('Code Block')
                ->help('Simple web editor'),
            Field::tag('tags')
                ->name('data.content.'.app()->getLocale().'.tags')
                ->title('Keywords')
                ->help('SEO keywords'),
            Field::tag('select')
                ->options([
                    'index'   => 'Index',
                    'noindex' => 'No index',
                ])
                ->name('data.content.'.app()->getLocale().'.select')
                ->title('Select tags')
                ->help('Allow search bots to index page'),
            Field::tag('input')
                ->type('text')
                ->name('data.content.'.app()->getLocale().'.phone')
                ->mask('(999) 999-9999')
                ->title('Phone')
                ->help('Number Phone'),

        ];

    }

}
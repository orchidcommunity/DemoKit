<?php
namespace Orchids\DemoKit\Http\Layouts\Pages;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Field;
use Orchid\Screen\Builder;
use Orchid\Screen\Repository;

class HeadingsLayout extends Rows
{

    public $template = 'orchids/demokit::layouts.headings';
    public function fields(): array
    {
        //dd($this->query->getContent($data_con.'.input'));
        //$data_con = 'data.content.' . app()->getLocale();

        return [
            /*
                        Field::tag('blank')
                            ->attr('p')
                            ->name($data_con.'.input'),


                        Field::tag('input')
                            ->type('text')
                            ->name($data_con.'.input')
                            ->max(255)
                            ->required()
                            ->title('Name Articles')
                            ->help('Article title'),
            */
        ];
    }

    /**
     * @param \Orchid\Screen\Repository $query
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function build(Repository $query)
    {
        $this->query = $query;
        $form = new Builder($this->fields(), $query);

        return view($this->template, [
            'form' => $form->generateForm(),
            'query' => $this->query,
        ]);
    }
}
<?php
namespace Orchids\DemoKit\Http\Layouts\Pages;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Field;
use Orchid\Screen\Builder;
use Orchid\Screen\Repository;

class TextListsLayout extends Rows
{

    public $template = 'orchids/demokit::layouts.textlists';

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
<?php
namespace Orchids\DemoKit\Http\Layouts\Modals;

use Illuminate\Support\Facades\File;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Field;
use Orchid\Screen\Fields\Builder;
use Orchid\Screen\Repository;
use Parsedown;


class HelpModalLayout extends Rows
{

    public $template = 'orchids/demokit::layouts.helpmodal';

    /**
     * @param \Orchid\Screen\Repository $query
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function build(Repository $query)
    {
       // $this->query = $query;
        //dd($query);
        $helptext =(new Parsedown())->text(File::get($query['helpmdpath']));
        //dd($helptext);
        return view($this->template, [
            'helptext' => $helptext,
        ]);
    }
}
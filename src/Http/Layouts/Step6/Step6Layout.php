<?php
namespace Orchids\DemoKit\Http\Layouts\Step6;

use Orchid\Platform\Models\Role;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Code;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Relation;
use Orchid\Press\Screen\Fields\Tags;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\TinyMCE;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\UTM;

class Step6Layout extends Rows
{
    /**
     * @return array
     */
	public function fields(): array
    {
        //$data_con='charts';
        //dd($this->query->getContent('charts'));
        $charts= collect($this->query->getContent('charts'));
        //dd($this->query->get['charts']);
        $labels=$charts->pluck(['label']);
        //dd($charts->pluck(['label']));
        return [
            Select::make('charts')
                ->options($labels)
                ->title('Select'),

            Relation::make('idea')
                ->fromModel(Role::class, 'slug')
                ->multiple()
                //->applyScope('active')
                ->title('Select one idea'),
            RelationMany::make('idea')
                ->fromModel(Role::class, 'slug')
                //->fromClass(AjaxWidget::class, 'slug')
                //->multiple()
                //->applyScope('active')
                ->title('Select one idea')
                //->handler(AjaxWidget::class),

        ];
    }
}
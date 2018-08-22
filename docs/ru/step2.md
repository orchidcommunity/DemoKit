# Шаг второй
----------

В этом уроке мы научимся получать и сохранять данные из базы, создадим макет с полями, добавим пункт в верхнее меню экрана.


## Экран с полями
 
Создадим протой экран на котором будут отображены почти все стандартные поля Orchid.

### 1. Добавим роуты и меню

В файле `routes/platform.php` в роут из предыдущего шага, добавим строку 
```
$router->screen('screen1/create', 'Step2Screen', 'platform.screens.step2.create');
```
И в файл `app/Http/Composers/MenuComposer.php` строку 
```
$this->dashboard->menu
    ->add('demokit-screens', [
        'slug'       => 'demokit-step2',
        'icon'       => 'icon-notebook',
        'route'      => route('platform.screens.step2.create'),
        'label'      => 'Step 2 - Screen Create',
        'groupname'  => 'Screens',
        'sort'       => 10,
    ]);
```
  
### 2. Добавим экран

Создадим файл экрана `app/Http/Screens/Step2Screen.php`

```
namespace App\Http\Screens;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Orchid\Press\Models\Post;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Layouts;
use Orchid\Screen\Link;
use Orchid\Screen\Screen;

use App\Http\Layouts\Step2Layout;

class Step2Screen extends Screen
{
    public $name = 'Screen edit';
    public $description = 'Simple screen with all fields';

    public function query($postdata = null) : array
    {
        $postdata = is_null($postdata) ? new Post() : $postdata;
        return [
            'data'   => $postdata,
        ];
    }

    public function commandBar() : array
    {
        return [
            Link::name('Save')->method('save'),
        ];
    }

    public function layout() : array
    {
        return [
            Step2Layout::class
        ];
    }

    public function save(Post $postdata)
    {
        $req = $this->request->get('data');
        $postdata->fill($req);
        $postdata->slug = is_null($postdata->slug) ? Str::slug($req['content'][app()->getLocale()]['input']) : $postdata->slug;
        $postdata->user_id = is_null($postdata->user_id) ? Auth::user()->id : $postdata->user_id;
        $postdata->type = 'demo-screen';
        $postdata->status = 'publish';
        $postdata->options = ['locale' => [ app()->getLocale() => 'true' ] ];
        $postdata->save();

        Alert::info('Data was saved');
        return redirect()->back();
    }
}
```

### 3. Добавим макет

Создадим макет в файл `app\Http\Layouts\Step2Layout.php` добавим все [***поля из документации***](https://orchid.software/ru/docs/field)

```
namespace Orchids\DemoKit\Http\Layouts\AllFields;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Field;

class Step2Layout extends Rows
{
	public function fields(): array
    {
        // data - название запроса который назначили в экране
        // content - столбец данных в таблице post  
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
                ->name($data_con.'.photos')
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
```


# Шаг первый
----------

В Orchid отображение информации строится на экранах ([Screens](https://orchid.software/ru/docs/screens)). Экран принимает данные, источником которых может быть: база данных, API или любые другие внешние источники.
Дальше экран отображает информацию через макеты, и обрабатывает полученную от них информацию.  
Экран может состоять из одного или нескольких макетов ([Layouts](https://orchid.software/ru/docs/layouts)), а макет может быть просто шаблоном (html, blade ...), таблицей или состоять из полей ([Fields](https://orchid.software/ru/docs/field)).
Один макет можно подключить к нескольким экранам и он будет отображать информацию из этой этих экранов.

## Простой экран

Для того чтобы сделать первый экран нужно добавить, роутинг (путь по которому будет открываться наш экран), а ткже пункты меню в админ панель.

### Роутинг (Route)

Роутинг обрабатывает запросы браузера, сделаем роутинг который обработает запрос `http://sitename.com/dashboard/screens/step1`.
Для этого добавим в файл `routes/platform.php` следующие строки
```
Route::prefix(Dashboard::prefix('/screens'))   //префикс нашего роута будет /dasboard/screens
    ->middleware(config('platform.middleware.private')) 
    ->namespace('App\Http\Screens')   //Расположение файлов обработчиков роута 
    ->group(function (\Illuminate\Routing\Router $router) {
        $router->screen('step1', 'Step1Screen', 'platform.screens.step1.edit');
        
        //Здесь будут добавляться роуты из других уроков
    });
```

### Меню

Теперь нужно добавить в левое меню ссылку на наш роутинг, для этого создадим конструктор меню, создадим файл `app/Http/Composers/MenuComposer.php` со следущими данными
```   
<?php

namespace App\Http\Composers;

use Orchid\Platform\Dashboard;

class MenuComposer
{
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    public function compose()
    {
        $this->dashboard->menu
            ->add('Main', [
                'slug'       => 'demokit-screens',
                'icon'       => 'icon-notebook',
                'route'      => '#',
                'label'      => 'DemoKit',
                'childs'     => true,
                'main'       => true,
                'sort'       => 300,
            ]);
        $this->dashboard->menu
            ->add('demokit-screens', [
                'slug'       => 'demokit-step1',
                'icon'       => 'icon-notebook',
                'route'      => route('platform.screens.step1.edit'),
                'label'      => 'Step 1 - Icon Screen',
                'groupname'  => 'Screens',
                'sort'       => 10,
            ]);
    }
}
```
Теперь подключим конструктор меню к провайдеру, для этого в файл `app/Providers/AppServiceProvider.php` в функцию `boot` добавим строку:
```
View::composer('platform::layouts.dashboard', App/Http/Composers/MenuComposer::class);
```

### Создание экрана

Сделаем экран который выводит макет из простого шаблона.

Создадим экран, для этого в каталог `app/Http/Screens` добавим файл `Step1Screen.php` с следующим содержимым.
  
```
namespace App\Http\Screens;

use Orchid\Screen\Screen;

use App\Http\Layouts\IconsLayout;   //Подключаемый макет

class Step1Screen extends Screen
{
    public $name = 'Заголовок экрана';
    public $description = 'Дополнительное описание под заголовком';
    /**
     * Данные передаваемые в макет
     */
    public function query() : array
    {
        return [];
    }

    /**
     * Подключаемые макеты
     *
     * @return array
     */
    public function layout() : array
    {
        return [
            IconsLayout::class
        ];
    }
}
```


### Макет и шаблон
Наш экран просто подключает макет, но не передает в него данные.
Создадим макет, для этого в каталоге `app\Http\Layouts\` добавим файл `IconsLayout.php` с следующим содержимым.
```
namespace App\Http\Layouts;

use Orchid\Screen\Layouts\Rows;

class IconsLayout extends Rows
{
    public $template = 'layouts.icons'; //подключить шаблон
}
```
Данный макет подключает файл шаблона, давайте создадим его, для этого в каталоге `/resources/views/layouts` создадим файл `icons.blade.php` в который можно внести любые html данные, например:
```
<div class="wrapper-md">
    <h2>Orchid icon collection</h2>
    <div class="row">
            <div class="col-4">
                <i class="icon-orchid icons"></i>
                <span class="name">icon-orchid</span>
            </div>
    </div>
</div>
```

Поздравляю!
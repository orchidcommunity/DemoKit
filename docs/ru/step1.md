# Шаг первый
----------

В Orchid отображение информации строится на экранах ([Screens](https://orchid.software/ru/docs/screens)). Экран принимает данные, источником которых может быть: база данных, API или любые другие внешние источники.
Дальше экран отображает информацию через макеты, и обрабатывает полученную от них информацию.  
Экран может состоять из одного или нескольких макетов ([Layouts](https://orchid.software/ru/docs/layouts)), а макет может быть просто шаблоном (html, blade ...), таблицей или состоять из полей ([Fields](https://orchid.software/ru/docs/field)).
Один макет можно подключить к нескольким экранам и он будет отображать информацию из этой этих экранов.


## Простой экран

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
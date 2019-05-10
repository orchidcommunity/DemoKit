# Шаг первый
----------

Orchid это не только админка, но и платформа для быстрого создания пользовательского интерфейса.
В Orchid отображение информации строится на экранах ([Screens](https://orchid.software/ru/docs/screens)). Экран принимает данные, источником которых может быть: база данных, API или любые другие внешние источники.
Дальше экран отображает информацию через макеты, и обрабатывает полученную от них информацию.  
Экран может состоять из одного или нескольких макетов ([Layouts](https://orchid.software/ru/docs/layouts)), а макет может быть просто шаблоном (html, blade ...), таблицей или состоять из полей ([Fields](https://orchid.software/ru/docs/field)).
Один макет можно подключить к нескольким экранам и он будет отображать информацию из этих экранов.

## Hello world

В первом шаге мы сделаем простой экран который будет передавать информацию в шаблон.
Будем передавать простую строку "Hello World", а также массив иконок отсюда ([Icons](https://orchid.software/ru/icons/))
 
### 1.1 Создание экрана

Сделаем экран который передает данные в шаблон.

Создадим экран, для этого в каталог `app/Http/Screens/Step1` добавим файл `DemokitStep1.php` с следующим содержимым.

<file prefix="DEMOKIT_PATH" file="/src/Http/Screens/Step1/DemokitStep1.php" strings="4-7,9-31,35-40,317-321,323-332,336-346,353-356" />

_([Если что-то не понятно посмотрите Исходник>>>](https://github.com/orchidcommunity/DemoKit/blob/master/src/Http/Screens/Step1/DemokitStep1.php))_

### 1.2 Создание шаблон

Наш экран просто подключает шаблон из файла `/resources/views/icons.blade.php` и передает в него данные.
Давайте создадим его, для этого в каталоге `/resources/views` создадим файл `icons.blade.php` в который можно внести любые html данные, например:

<file prefix="DEMOKIT_PATH" file="/resources/views/layouts/icons.blade.php" strings="23-34" />

_([Если что-то не понятно посмотрите Исходник>>>](https://github.com/orchidcommunity/DemoKit/blob/master/resources/views/layouts/icons.blade.php))_

### 1.3 Роутинг (Route)

Для того чтобы наш экран отобразился нужно добавить, роутинг (путь по которому будет открываться наш экран), а также пункты меню в админ панель.

Роутинг обрабатывает запросы браузера, сделаем роутинг который обработает запрос `http://sitename.com/dashboard/demokit/step1`.
Для этого добавим в файл `routes/platform.php` следующие строки

<file prefix="DEMOKIT_PATH" file="/routes/route.php" strings="3,9,10" />

_([Если что-то не понятно посмотрите Исходник>>>](https://github.com/orchidcommunity/DemoKit/blob/master/routes/route.php))_

Теперь наш экран отобразится по адресу `http://sitename.com/dashboard/demokit/step1`

### 1.4 Меню

Теперь нужно добавить в левое меню ссылку на наш роутинг, для этого создадим создадим файл `app/Http/Composers/MenuComposer.php` со следущими данными

<file prefix="DEMOKIT_PATH" file="/src/Providers/MenuComposer.php" strings="5-33,35-42,76-78" />

Далее нужно подключить конструктор меню к провайдеру, для этого в файл `app/Providers/AppServiceProvider.php` в функцию `boot` добавим строку:

<file prefix="DEMOKIT_PATH" file="/src/Providers/DemoKitProvider.php" strings="22" />

Поздравляю!
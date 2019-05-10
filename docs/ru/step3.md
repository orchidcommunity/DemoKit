# Шаг третий
----------

В предыдущем уроке мы научились добавлять данные в базу данных, теперь отобразим добавленные данные.

В этом уроке научимся выводить данные в таблицу, настраивать фильтрование и сортировку, а также автоматически заполнять данными (seed).

## Экран с таблицей
 
Создадим экран на котором будут отображены списком все наши добавленные данные.

### 3.1 Добавим экран

Создадим файл экрана `app/Http/Screens/Step3/DemokitStep3List.php`

<file prefix="DEMOKIT_PATH" file="/src/Http/Screens/Step3/DemokitStep3List.php" strings="5-11,15-38,40-49,53-64,70-79,98" />

_([Исходник>>>](https://github.com/orchidcommunity/DemoKit/blob/master/src/Http/Screens/Step3/DemokitStep3List.php))_

### 3.2 Добавим макет

Создадим макет ([Layouts](https://orchid.software/ru/docs/layouts)) в файле `app\Http\Layouts\Step3\Step3Layout.php`

<file prefix="DEMOKIT_PATH" file="/src/Http/Layouts/Step3/Step3Layout.php" strings="4-33" />

_([Исходник>>>](https://github.com/orchidcommunity/DemoKit/blob/master/src/Http/Layouts/Step3/Step3Layout.php))_

### 2.3 Роуты и меню

Теперь чтобы наш экран отобразился нужно добавить роуты и пункт меню. 

В файле `routes/platform.php` добавим строку 

<file prefix="DEMOKIT_PATH" file="/routes/route.php" strings="14" />

также добавим роут редактирования данных ссылающийся на экран в шаге 2 

<file prefix="DEMOKIT_PATH" file="/routes/route.php" strings="12" />

осталось добавить пункт меню

В файл `app/Http/Composers/MenuComposer.php` добавим строки 

<file prefix="DEMOKIT_PATH" file="/src/Providers/MenuComposer.php" strings="26,53-60" />

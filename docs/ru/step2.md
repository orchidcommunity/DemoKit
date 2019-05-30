# Шаг второй
----------

В этом уроке мы научимся получать и сохранять данные из базы, создадим макет с полями, добавим пункт в верхнее меню экрана, а также научимся разграничивать права доступа.


## Экран с полями
 
Создадим протой экран на котором будут отображены почти все стандартные поля Orchid, и сохраним эти данные в базу данных.

### 2.1 Добавим экран

Создадим файл экрана `app/Http/Screens/Step2/DemokitStep2Edit.php`

<file prefix="DEMOKIT_PATH" file="/src/Http/Screens/Step2/DemokitStep2Edit.php" select="4-12,16-50,52-61,63-76,80-118" />

_([Исходник>>>](https://github.com/orchidcommunity/DemoKit/blob/master/src/Http/Screens/Step2/DemokitStep2Edit.php))_

Данный экран отличается от экрана в шаге 1 тем что отправляет данные в макет `Step2Layout` а также имеет метод `save` и `remove` для сохранения и удаления данных.

### 2.2 Добавим макет

Создадим макет ([Layouts](https://orchid.software/ru/docs/layouts)) в файле `app\Http\Layouts\Step2\Step2Layout.php` и добавим в него добавим все [***поля из документации***](https://orchid.software/ru/docs/field)

<file prefix="DEMOKIT_PATH" file="/src/Http/Layouts/Step2/Step2Layout.php" select="4-78" />

_([Исходник>>>](https://github.com/orchidcommunity/DemoKit/blob/master/src/Http/Layouts/Step2/Step2Layout.php))_

### 2.3 Роуты

Теперь чтобы наш экран отобразился нужно добавить роуты и пункт меню. 

В файле `routes/platform.php` добавим строку 

<file prefix="DEMOKIT_PATH" file="/routes/route.php" select="14" />

### 2.3 Права доступа _([Permissions](https://orchid.software/ru/docs/access/))_

_[Права доступа](https://orchid.software/ru/docs/access/)_ нужны для разграничения доступа определенным пользователям и группам пользователей.

Для создания прав доступа нужно в файле провайдера `app/Providers/AppServiceProvider.php` в функцию `boot` добавим строки:

<file prefix="DEMOKIT_PATH" file="/src/Providers/DemoKitProvider.php" select="46-48" />
 и добавить функцию:
<file prefix="DEMOKIT_PATH" file="/src/Providers/DemoKitProvider.php" select="51-58" />

### 2.4 Меню

В файл `app/Http/Composers/MenuComposer.php` добавим строки 

<file prefix="DEMOKIT_PATH" file="/src/Providers/MenuComposer.php" select="26,45-52" />
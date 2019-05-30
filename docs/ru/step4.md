# Шаг четвертый
----------

В этом уроке научимся добавлять дополнительные иконки в таблице, а также использовать разное расположение макетов

## Экран с таблицей
 
Создадим экран на котором будут отображены списком все наши добавленные данные он будет аналогичен экрану в Уроке №3.

### 4.1 Добавим экран таблицы

Создадим файл экрана `app/Http/Screens/Step4/DemokitStep4List.php` по анологии с предыдущим уроком

<file prefix="DEMOKIT_PATH" file="/src/Http/Screens/Step4/DemokitStep4List.php" />

### 4.2 Добавим макет таблицы

Создадим файл макета `app/Http/Layouts/Step4/Step4Layout.php` 

<file prefix="DEMOKIT_PATH" file="/src/Http/Layouts/Step4/Step4Layout.php" />

обратите внимание на метод `Render` с помощю него можно генерировать любое содержимое в ячейке таблицы.


### 4.3 Добавим экран отображения макетов

Создадим файл экрана `app/Http/Screens/Step4/DemokitStep4.php` 

Главное в данном эране метод `layout`, где видно как создавать разные комбинации макетов.

<file prefix="DEMOKIT_PATH" file="/src/Http/Screens/Step4/DemokitStep4.php" select="78-136" />



<?php
namespace Orchids\DemoKit\Http\Layouts\Modals;

use Illuminate\Support\Facades\File;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Field;
use Orchid\Screen\Builder;
use Orchid\Screen\Repository;
use Parsedown;
use function PHPSTORM_META\type;


class HelpModalLayout extends Rows
{

    public $template = 'orchids/demokit::layouts.helpmodal';

    public function fields(): array {
        return [];
    }

    /**
     * @param \Orchid\Screen\Repository $query
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function build(Repository $query)
    {
        $file=File::get($query['helpmdpath']);
        /*
        $pattern = '#<file[^>]+?(?:prefix\s*?=\s*?["\'](.+?)["\']\s*?)?file\s*?=\s*?["\'](.+?)["\']\s*?strings\s*?=\s*?["\'](.+?)["\'][^>]*?>#su';
        //<file[^>]+?(?:prefix\s*?=\s*?["'](.+?)["']\s*?)?file\s*?=\s*?["'](.+?)["']\s*?strings\s*?=\s*?["'](.+?)["'][^>]*?remove\s*?=\s*?["'](.+?)["'][^>]*?>
        */
        $pattern = '#<file[^>](.+?)\/?>#su';
        $res = preg_replace_callback($pattern,
            function($matches){
                preg_match_all("#([^,\s]+)\s*?=\s*?[\"'](.*?)[\"']#s", $matches[1], $fileTagArray);
                //$fileTagArray = array_combine($out[1],$out[2]) ;
                //dd($out);

                return $this->getStringsFromFile(array_combine($fileTagArray[1],$fileTagArray[2]));
            }
            ,$file);

        //$helptext =(new Parsedown())->text(File::get($query['helpmdpath']));
        $helptext =(new Parsedown())->text($res);

        return view($this->template, [
            'helptext' => $helptext,
        ]);
    }
    /*
     * формат в доке <file prefix="DEMOKIT_PATH" file="/src/Http/Screens/Step3/DemokitStep3List.php" select="5-11,98,15-38,40-49,53-64,70-79" exclude="14-38,40-49,53-64,70-79" />
     * $prefix - абсолютный путь к пакету
     * $file -  путь к файлу от корня пакета
     * $select -  строка в формате "5-11,15,40-49,53-64" строки которые нужно отобразить если "" или нет параметра то все строки
     * $exclude - строки которые нужно вычесть если "" или нет параметра то ничего не вычетать.
     * $marker_select - добавляют строки отмеченные маркером по умолчанию маркер //+++
     * $marker_exclude - вычетает строки отмеченные маркером по умолчанию маркер //---
    */

    public function getStringsFromFile(array $parameters) {
        extract ($parameters);
        $prefix = $prefix ?? '';
        $prefix = @constant($prefix) ?? $prefix;

        $file = $file ?? '';
        $text = File::get($prefix.$file);
        $text = str_replace(array("\r\n", "\r"), "\n", $text);
        $text = trim($text, "\n");
        $lines = explode("\n", $text);

        $select = !empty($select)?$select:'1-'.count($lines);
        $sort   = (!empty($sort)&&($sort=='false'))?false:true;
        $marker   = (!empty($marker)&&($marker=='false'))?false:true;

        $marker_select = $marker_select ?? "//+++";
        $marker_exclude = $marker_exclude ?? "//---";
        //$select = $select ?? '1-'.count($lines);
        //dd($select);

        //$exclude = $exclude ?? null;
        //dd($removes);


        $map =[];
        $selects = explode(",", $select);
        foreach ($selects as $select) {
            if (strpos($select, "-")!==false) {
                $interval = explode("-", $select);
                for ($i=((int)$interval[0]);$i<=((int)$interval[1]);$i++) {
                    $map[]=$i;
                }
            } else {
                $map[]=(int) $select;
            }
        }
        if ($marker) {
            foreach ($lines as $key => $line) {
                if (strpos($line, $marker_select) !== false) {
                    $map[] = $key + 1;
                }
            }
        }


        if ($sort) sort($map);

        //dd($map);
        //dump($exclude);
        $map = array_flip ($map);

        if (!empty($exclude)) {
            //dump($map);
            $excludes = explode(",", $exclude);
            foreach ($excludes as $exclude) {
                if (strpos($exclude, "-") !== false) {
                    $interval = explode("-", $exclude);
                    for ($i = ((int)$interval[0]); $i <= ((int)$interval[1]); $i++) {
                        unset($map[$i]);
                    }
                } else {
                    unset($map[(int)$exclude]);
                }
            }
        }
        if ($marker) {
            foreach ($lines as $key => $line) {
                if (strpos($line, $marker_exclude) !== false) {
                    unset($map[$key + 1]);
                }
            }
        }
        $map = array_flip ($map);
        //dump($map);

        $result='```php'."\n";
        foreach ($map as $string) {
            $result.=@$this->deleteComment($lines[((int) $string)-1])."\n";/*
            if (strpos($string, "-")!==false) {
                $interval = explode("-", $string);
                for ($i=((int)$interval[0])-1;$i<=((int)$interval[1])-1;$i++) {
                    $result.=@$this->deleteComment($lines[$i])."\n";
                }
            } else {
                $result.=@$this->deleteComment($lines[((int) $string)-1])."\n";
            }*/
        }
        $result.='```';
        return $result;
    }

    public function deleteComment($line) {
        return str_replace("//***", "", $line);
    }
}
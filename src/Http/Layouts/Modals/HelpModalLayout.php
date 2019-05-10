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
        $pattern = '#<file[^>]+?(?:prefix\s*?=\s*?["\'](.+?)["\']\s*?)?file\s*?=\s*?["\'](.+?)["\']\s*?strings\s*?=\s*?["\'](.+?)["\'][^>]*?>#su';
        $res = preg_replace_callback($pattern,
            function($matches){
                return $this->getStringsFromFile($matches[1],$matches[2],$matches[3]);
            }
            ,$file);

        //$helptext =(new Parsedown())->text(File::get($query['helpmdpath']));
        $helptext =(new Parsedown())->text($res);

        return view($this->template, [
            'helptext' => $helptext,
        ]);
    }

    public function getStringsFromFile(string $prefix, string $file, string $strings) {
        $prefix = @constant($prefix) ?? $prefix;
        $text = File::get($prefix.$file);
        $text = str_replace(array("\r\n", "\r"), "\n", $text);
        $text = trim($text, "\n");
        $lines = explode("\n", $text);
        $result='```php'."\n";

        $strings = explode(",", $strings);
        foreach ($strings as $string) {
            if (strpos($string, "-")!==false) {
                $interval = explode("-", $string);
                for ($i=((int)$interval[0])-1;$i<=((int)$interval[1])-1;$i++) {
                    $result.=@$this->deleteComment($lines[$i])."\n";
                }
            } else {
                $result.=@$this->deleteComment($lines[((int) $string)-1])."\n";
            }
        }
        $result.='```';
        return $result;
    }

    public function deleteComment($line) {
        return str_replace("//***", "", $line);
    }
}
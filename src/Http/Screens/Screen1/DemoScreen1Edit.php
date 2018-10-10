<?php
namespace Orchids\DemoKit\Http\Screens\Screen1;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Orchid\Press\Models\Post;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Layouts;
use Orchid\Screen\Link;
use Orchid\Screen\Screen;

//use Orchids\DemoKit\Models\DemoPost;
use Orchids\DemoKit\Http\Layouts\AllFields\DemoEdit1Layout;
use Orchids\DemoKit\Http\Layouts\Modals\HelpModalLayout;


class DemoScreen1Edit extends Screen
{
	
    /**
     * Display header name
     *
     * @var string
     */
    public $name = 'Screen edit';
    /**
     * Display header description
     *
     * @var string
     */
    public $description = 'Simple screen with all fields';
    /**
     * Query data
     *
     * @param Post $postdata
     *
     * @return array
     */
    public function query($postdata = null) : array
    {
        $postdata = is_null($postdata) ? new Post() : $postdata; //Post::whereId($postdata)->first();
        return [
            'data'   => $postdata,
            'helpmdpath'  => DEMOKIT_PATH.'/docs/ru/step2.md',
        ];
    }
    /**
     * Button commands
     *
     * @return array
     */
    public function commandBar() : array
    {
        return [
            Link::name('Help Step 2')
                ->modal('HelpModal'),
            Link::name('Save')->method('save'),
            Link::name('Remove')->method('remove'),

        ];
    }
    /**
     * Views
     *
     * @return array
     */
    public function layout() : array
    {
        return [
		
		    Layouts::columns([
                'EditLayout' => [
                    DemoEdit1Layout::class
                ],
            ]),
            Layouts::modals([
                'HelpModal' => [
                    HelpModalLayout::class,
                ],
            ])->class('modal-lg'),
		
        ];
    }
    /**
     * @param $request
     * @param Post $postdata
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Post $postdata)
    {

        //dd($postdata);
        $req = $this->request->get('data');
        //dd($req['content'][app()->getLocale()]['input']);
        $postdata->fill($req);
        $postdata->slug = is_null($postdata->slug) ? Str::slug($req['content'][app()->getLocale()]['input']) : $postdata->slug;
        $postdata->user_id = is_null($postdata->user_id) ? Auth::user()->id : $postdata->user_id;
        $postdata->type = 'demo-screen';
        $postdata->status = 'publish';
        $postdata->options = ['locale' => [ app()->getLocale() => 'true' ] ];
        $postdata->save();
        $postdata->attachment()
                ->attach(array_diff($this->request->get('data_photos') ?? [],$postdata->attachment()->pluck('attachment_id')->toArray()));

        Alert::info('Data was saved');
        return redirect()->back();
    }
    /**
     * @param $request
     * @param Post $postdata
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
	 
    public function remove(Post $postdata)
    {
        $postdata->delete();
        Alert::info('Data was removed');
        return redirect()->back();
    }
}
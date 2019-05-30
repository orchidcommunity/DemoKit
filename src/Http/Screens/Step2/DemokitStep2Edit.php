<?php
namespace Orchids\DemoKit\Http\Screens\Step2;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Orchid\Press\Models\Post;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Layout;
use Orchid\Screen\Link;
use Orchid\Screen\Layouts\Modals;
use Orchid\Screen\Screen;
//***use App\Http\Layouts\Step2\Step2Layout;
use Orchids\DemoKit\Http\Layouts\Step2\Step2Layout;
use Orchids\DemoKit\Http\Layouts\Modals\HelpModalLayout;


class DemokitStep2Edit extends Screen
{
    public $edit = true;
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
     * @param Post $demokitPost
     *
     * @return array
     */
    public function query($demokitPost = null) : array
    {
         if (is_null($demokitPost)) {
            $demokitPost = new Post();
            $this->edit = false;
            $this->description = 'Add new post';
        } else {
            $this->description = 'Edit post';
        }

        return [
            'data'   => $demokitPost,
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
            Link::name('Help Step 2')->icon('icon-question')->modal('HelpModal'),
            Link::name('Add')->icon(' icon-plus')->method('save')->canSee(!$this->edit),
            Link::name('Save')->icon('icon-check')->method('save')->canSee($this->edit),
            Link::name('Remove')->icon('icon-close')->method('remove')->canSee($this->edit),
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
            Step2Layout::class,
            Layout::modals([
                'HelpModal' => [HelpModalLayout::class],
            ])->size(Modals::SIZE_LG),
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
        $req = $this->request->get('data');
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
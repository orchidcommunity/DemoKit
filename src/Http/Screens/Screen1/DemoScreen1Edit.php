<?php
namespace Orchids\DemoKit\Http\Screens\Screen1;

use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Setting;
use Orchid\Screen\Layouts;
use Orchid\Screen\Link;
use Orchid\Screen\Screen;

use Orchids\DemoKit\Models\DemoPost;
use Orchids\DemoKit\Http\Layouts\AllFields\DemoEdit1Layout;


class DemoScreen1Edit extends Screen
{
	
    /**
     * Display header name
     *
     * @var string
     */
    public $name = 'Setting edit';
    /**
     * Display header description
     *
     * @var string
     */
    public $description = 'Edit setting';
    /**
     * Query data
     *
     * @param XSetting $xsetting
     *
     * @return array
     */
    public function query($demokitdata= null) : array
    {

        $demokitdata = is_null($demokitdata) ? new DemoPost() : DemoPost::whereId($demokitdata)->first();
        //dd($demokitdata);
        return [
            'data'   => $demokitdata,
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
		
        ];
    }
    /**
     * @param $request
     * @param XSetting $xsetting
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save($request, XSetting $xsetting)
    {

		$req = $this->request->get('xsetting');

        if ($req['options']['type']=='code') {
            $req['value']=json_decode($req['value'], true);
        }

		$xsetting->updateOrCreate(['key' => $req['key']], $req );

        Alert::info('Setting was saved');
        return redirect()->route('platform.xsetting.list');
    }
    /**
     * @param $request
     * @param XSetting $xsetting
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
	 
    public function remove($request, XSetting $xsetting)
    {
		$xsetting->where('id',$request)->delete();
        Alert::info('Setting was removed');
        return redirect()->route('platform.xsetting.list');
    }
}
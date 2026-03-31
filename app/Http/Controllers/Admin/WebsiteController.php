<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function setting()
    {

      $data                 = array();
        $alldata              = Website::get()->toArray();
        $data['setting'] = array_column($alldata, 'value', 'name');
        $data['menus'] = Menu::get();
        return view('admin.pages.setting.homepage', $data);

      
    }

    public function settingUpdate(Request $request)
    {
            $updatedata = $request->except(['_token']);


            $updatedata['home_page_menu'] = json_encode($updatedata['home_page_menu']);
        foreach ($updatedata as $key => $data) {
            Website::updateOrCreate(
                ['name' => $key],
                ['value' => $data],
            );
        }
        return redirect()->back();
    }
}

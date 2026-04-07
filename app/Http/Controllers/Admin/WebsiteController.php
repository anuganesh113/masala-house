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
        $data['menus'] = Menu::status()->get();
        return view('admin.pages.setting.homepage', $data);
    }

    public function settingUpdate(Request $request)
    {
       
        $updatedata = $request->except(['_token']);
        if($request->file('section_2_background_image')){
            $file= $request->file('section_2_background_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/home/'), $filename);
            $updatedata['section_2_background_image'] = $filename;
        }
        
        if (isset($updatedata['section_2_menu'])) {
            $updatedata['section_2_menu'] = json_encode($updatedata['section_2_menu']);
        }
        if (isset($updatedata['section_3_menu'])) {
            $updatedata['section_3_menu'] = json_encode($updatedata['section_3_menu']);
        }


        foreach ($updatedata as $key => $data) {
            Website::updateOrCreate(
                ['name' => $key],
                ['value' => $data],
            );
        }
        return redirect()->back()->with('success', 'Setting Updated Successfully');
    }
}

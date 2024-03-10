<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
       return view('admin.setting',compact('setting'),['pageName' => 'Settings']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'site_title' => 'required',
            'email' => 'required','unique:users',
            'mobile_no' => 'required',
            'address' => 'required',
            'footer_text' => 'required',
        ]);

        $data = Setting::first();
        if (isset($data->id))
        {
            $setting = Setting::find($data->id);
            //dd($setting);

            if(empty($request['site_logo'])){
                $setting->site_logo = $setting->site_logo;  //image fetch db
            }else{
                //new add image edit time
                $site_logo = time().'-'.$request['site_logo']->getClientOriginalExtension();
                $request['site_logo']->move('site_image',$site_logo);
                $setting->site_logo =  $site_logo;
            }

            if(empty($request['fav_icon'])){
                $setting->fav_icon = $setting->fav_icon;  //image fetch db
            }else{
                //new add image edit time
                $fav_icon = time().'-'.'icon'.'-'.$request['fav_icon']->getClientOriginalExtension();
                $request['fav_icon']->move('site_image',$fav_icon);
                $setting->fav_icon =  $fav_icon;
            }
            $setting->site_title =  $request['site_title'];
            $setting->email =  $request['email'];
            $setting->mobile_no =  $request['mobile_no'];
            $setting->address =  $request['address'];
            $setting->footer_text =  $request['footer_text'];
            $setting->save();
            toastr()->info('Setting Updated successfully', 'Setting', ['timeOut' => 5000]);
            //return redirect()->route('admin.setting')->with('message','Setting Updated successfully');
            return redirect()->route('admin.setting');

        }else{

            $setting = new Setting();
            $site_logo = time().'-'.$request['site_logo']->getClientOriginalExtension();
            $request['site_logo']->move('site_image',$site_logo);

            $setting->site_logo =  $site_logo;

            $fav_icon = time().'-'.'icon'.'-'.$request['fav_icon']->getClientOriginalExtension();
            $request['fav_icon']->move('site_image',$fav_icon);

            $setting->fav_icon =  $fav_icon;
            $setting->site_title =  $request['site_title'];
            $setting->email =  $request['email'];
            $setting->mobile_no =  $request['mobile_no'];
            $setting->address =  $request['address'];
            $setting->footer_text =  $request['footer_text'];
            $setting->save();
            toastr()->success('Setting Added successfully', 'Setting', ['timeOut' => 5000]);
            return redirect()->route('admin.setting');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

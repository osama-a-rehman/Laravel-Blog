<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingsController extends Controller
{
    public function index() {
        return view('admin.settings.settings')->with('settings', Setting::first());
    }

    //
    public function update() {
        $request = request();

        $this->validate($request, [
            'site_name' => 'required',
            'contact_no' => 'required',
            'contact_email' => 'required',
            'address' => 'required'
        ]);

        $settings = Setting::first();

        $settings->site_name = $request->site_name;
        $settings->contact_no = $request->contact_no;
        $settings->contact_email = $request->contact_email;
        $settings->address = $request->address;

        $settings->save();

        Session::flash('success', 'Settings updated successfully');

        return redirect()->back();
        
    }
}

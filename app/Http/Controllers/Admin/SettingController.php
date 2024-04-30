<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $dbsettings = Setting::all();
        foreach ($dbsettings as $setting) {
            $settings[$setting['name']] = $setting['content'];
        }

        return view('Admin.settings.index', ['settings' => $settings]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'bgcolor' => 'regex:/#[A-Z0-9]{6}/i',
            'textcolor' => 'regex:/#[A-Z0-9]{6}/i'
        ]);

        $data = $request->only(['title', 'subtitle', 'email', 'bgcolor', 'textcolor']);
       
        foreach ($data as $item => $value) {
            Setting::where('name', $item)->update([
                'content' => $value
            ]);
        }
        return redirect()->route('settings');
    }
}

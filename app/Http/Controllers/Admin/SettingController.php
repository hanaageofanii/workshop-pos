<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $serviceFee = Setting::get('service_fee', 0);
        return view('admin.setting', compact('serviceFee'));
    }

    public function update(Request $request)
    {
        Setting::updateOrCreate(
            ['key' => 'service_fee'],
            ['value' => $request->service_fee]
        );

        return back()->with('success', 'Biaya jasa berhasil diupdate');
    }
}
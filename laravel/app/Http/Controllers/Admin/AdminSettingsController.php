<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminSettingsController extends Controller
{
    //
    public function edit()
    {
        $settings = [
            'site_name' => SiteSetting::get('site_name') ?? '',
            'site_logo' => SiteSetting::get('site_logo') ?? '',
            'site_description' => SiteSetting::get('site_description') ?? '',
            'owner_name' => SiteSetting::get('owner_name') ?? '',
            'owner_email' => SiteSetting::get('owner_email') ?? '',
            'home_title' => SiteSetting::get('home_title') ?? '',
            'home_description' => SiteSetting::get('home_description') ?? '',
            'home_image_path' => SiteSetting::get('home_image_path') ?? '',
        ];
        return view('admin.settings.edit', compact('settings'));
    }

    public function updateSite(Request $request)
    {
        // Validate and update site settings
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:255',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        SiteSetting::updateOrCreate(['key' => 'site_name'], ['value' => $request->input('site_name')]);
        SiteSetting::updateOrCreate(['key' => 'site_description'], ['value' => $request->input('site_description')]);
        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $uuid = Str::uuid()->toString();
            $extension = $image->getClientOriginalExtension();
            $filename = $uuid . '.' . $extension;
            $image->move(public_path('home'), $filename);

            $logoPath = 'home/' . $filename;
            SiteSetting::updateOrCreate(['key' => 'site_logo'], ['value' => $logoPath]);
        }

        return redirect()->route('dashboard.settings.edit')->with('success', 'Site settings updated successfully.');
    }

    public function updateOwner(Request $request)
    {
        // Validate and update owner settings
        $request->validate([
            'owner_name' => 'string|max:255',
            'owner_email' => 'email|max:255',
        ]);

        SiteSetting::updateOrCreate(['key' => 'owner_name'], ['value' => $request->input('owner_name')]);
        SiteSetting::updateOrCreate(['key' => 'owner_email'], ['value' => $request->input('owner_email')]);
        return redirect()->route('dashboard.settings.edit')->with('success', 'Owner settings updated successfully.');
    }

    public function updateHome(Request $request)
    {
        // Validate and update home settings
        $request->validate([
            'home_title' => 'nullable|string|max:255',
            'home_description' => 'nullable|string|max:255',
            'home_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        SiteSetting::updateOrCreate(['key' => 'home_title'], ['value' => $request->input('home_title')]);
        SiteSetting::updateOrCreate(['key' => 'home_description'], ['value' => $request->input('home_description')]);
        if ($request->hasFile('home_image_path')) {
            $image = $request->file('home_image_path');
            $uuid = Str::uuid()->toString();
            $extension = $image->getClientOriginalExtension();
            $filename = $uuid . '.' . $extension;
            $image->move(public_path('home'), $filename);

            $imagePath = 'home/' . $filename;
            SiteSetting::updateOrCreate(['key' => 'home_image_path'], ['value' => $imagePath]);
        }

        return redirect()->route('dashboard.settings.edit')->with('success', 'Home settings updated successfully.');
    }
}

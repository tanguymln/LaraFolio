<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $settings = [
            'home_image_path' => SiteSetting::get('home_image_path') ?? null,
            'owner_name' => trim(SiteSetting::get('owner_name')) ?? null,
            'owner_title' => SiteSetting::get('owner_title') ?? '',
        ];

        $services = Service::all();
        $projects = Project::all();
        return view('home', compact('settings', 'services', 'projects'));
    }
}

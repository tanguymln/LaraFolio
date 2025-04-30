<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    //

    public function index()
    {
        return view("setup.step1");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "site_name" => "required|string|max:255",
                // autres validations
            ],
            [
                "site_name.required" => "Le nom du site est obligatoire.",
                "site_name.numeric" => "Le nom du site doit être un nombre.",
                "site_name.max" => "Le nom du site ne doit pas dépasser 255 caractères.",
                // autre message d'erreur
            ],
        );

        SiteSetting::create([
            "key" => "site_name",
            "value" => $request->input("site_name"),
        ]);

        return redirect("/");
    }
}

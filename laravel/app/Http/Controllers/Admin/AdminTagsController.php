<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagsController extends Controller
{
    //
    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        // Validate and store the tag
        // Redirect or return a response
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->save();
        return redirect()->route('dashboard.projects.create')->with('success', 'Tag created successfully.');
    }
}

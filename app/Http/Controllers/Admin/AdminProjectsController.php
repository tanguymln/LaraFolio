<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class AdminProjectsController extends Controller
{
    //

    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        // Validate and store the project
        // Redirect or return a response
    }

    public function edit($id)
    {
        return view('admin.projects.edit', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        // Validate and update the project
        // Redirect or return a response
    }

    public function destroy($id)
    {
        // Delete the project
        // Redirect or return a response
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('dashboard.projects.index')->with('success', 'Project deleted successfully.');
    }
}

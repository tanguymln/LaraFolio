<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProjectsController extends Controller
{
    //

    public function index()
    {
        $projects = Project::with('tags')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.projects.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'project_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
        ]);

        $project = new Project();
        $project->title = $validated['name'];
        $project->description = $validated['description'];

        if ($request->hasFile('project_images')) {
            $image = $request->file('project_images');
            $uuid = Str::uuid()->toString();
            $extension = $image->getClientOriginalExtension();
            $filename = $uuid . '.' . $extension;
            $image->move(public_path('projects'), $filename);

            // Sauvegarde le tableau d'images en JSON dans le champ `image`
            $project->image = 'projects/' . $filename;
        }

        $project->save();

        if (!empty($validated['tags'])) {
            $project->tags()->attach($validated['tags']);
        }

        return redirect()->route('dashboard.projects.index')->with('success', 'Projet créé avec succès.');
    }

    public function edit($id)
    {
        $project = Project::with('tags')->findOrFail($id);
        $tags = Tag::all();
        return view('admin.projects.edit', compact('project', 'tags'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the project
        // Redirect or return a response
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'project_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
        ]);
        $project = Project::findOrFail($id);
        $project->title = $validated['name'];
        $project->description = $validated['description'];
        if ($request->hasFile('project_images')) {
            $image = $request->file('project_images');
            $uuid = Str::uuid()->toString();
            $extension = $image->getClientOriginalExtension();
            $filename = $uuid . '.' . $extension;
            $image->move(public_path('projects'), $filename);

            // Sauvegarde le tableau d'images en JSON dans le champ `image`
            $project->image = 'projects/' . $filename;
        }
        $project->save();
        if (!empty($validated['tags'])) {
            $project->tags()->sync($validated['tags']);
        } else {
            $project->tags()->detach();
        }
        return redirect()->route('dashboard.projects.index')->with('success', 'Projet mis à jour avec succès.');
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

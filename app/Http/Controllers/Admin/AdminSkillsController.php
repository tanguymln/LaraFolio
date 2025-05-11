<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class AdminSkillsController extends Controller
{
    //
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }
    public function create()
    {
        return view('admin.skills.create');
    }
    public function store(Request $request)
    {
        // Validate and store the skill
        // Redirect or return a response
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
        ]);
        $skill = new Skill();
        $skill->name = $request->input('name');
        $skill->level = $request->input('level');
        $skill->description = $request->input('description');
        $skill->link = $request->input('link');
        $skill->save();
        return redirect()->route('dashboard.skills.index')->with('success', 'Skill created successfully.');
    }
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }
    public function update(Request $request, $id)
    {
        // Validate and update the skill
        // Redirect or return a response
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
        ]);
        $skill = Skill::findOrFail($id);
        $skill->name = $request->input('name');
        $skill->level = $request->input('level');
        $skill->description = $request->input('description');
        $skill->link = $request->input('link');
        $skill->save();
        return redirect()->route('dashboard.skills.index')->with('success', 'Skill updated successfully.');
    }
    public function destroy($id)
    {
        // Delete the skill
        // Redirect or return a response
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return redirect()->route('dashboard.skills.index')->with('success', 'Skill deleted successfully.');
    }
    public function show($id)
    {
        return view('admin.skills.show', ['id' => $id]);
    }
}

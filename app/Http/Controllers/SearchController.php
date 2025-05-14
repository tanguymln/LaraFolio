<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query || strlen($query) < 2) {
            return response()->json([]);
        }

        $services = Service::search($query)
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'type' => 'Services',
                    'url' => route('services') . '#service-' . $item->id,
                ];
            });

        $projects = Project::search($query)
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->title,
                    'type' => 'Projects',
                    'url' => route('about'),
                ];
            });

        $skills = Skill::search($query)
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'type' => 'Skills',
                    'url' => 'about',
                ];
            });

        return response()->json($services->concat($projects)->concat($skills)->values());
    }
}

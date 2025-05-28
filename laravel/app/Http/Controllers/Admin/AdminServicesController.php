<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AdminServicesController extends Controller
{
    //
    public function index()
    {
        return view('admin.services.index', [
            'services' => Service::all(),
        ]);
    }

    public function show($id)
    {
        // Find the service by ID and return the view
        return view('admin.services.show', compact('service'));
    }

    public function create()
    {
        // Return the view to create a new service

        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        // Validate and store the service
        // Redirect or return a response
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();

        return redirect()->route(route: 'dashboard.services.index')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        // Find the service by ID and return the edit view
        $service = Service::findOrFail($id);
        if (!$service) {
            return redirect()->route(route: 'dashboard.services.index')->with('error', 'Service not found.');
        }
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the service
        // Redirect or return a response
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();
        return redirect()->route(route: 'dashboard.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        // Find the service by ID and delete it
        // Redirect or return a response
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route(route: 'dashboard.services.index')->with('success', 'Service deleted successfully.');
    }
}

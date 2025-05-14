<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Service;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('quote', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'services' => 'required|json',
            'total_price' => 'required|numeric|min:0',
        ]);

        $serviceIds = json_decode($request->input('services'), true);
        if (!is_array($serviceIds)) {
            return back()
                ->withInput()
                ->withErrors(['services' => 'La sélection des services est invalide.']);
        }

        $quote = Quote::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        $quote->services()->sync($serviceIds);
        return redirect()->route('home')->with('success', 'Votre demande de devis a bien été envoyée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

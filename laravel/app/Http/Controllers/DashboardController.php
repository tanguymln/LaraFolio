<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Quote;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Visit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits = Visit::all();

        $quotesCount = Quote::count();
        $contactsCount = Contact::count();
        $servicesCount = Service::count();
        $skillsCount = Skill::count();

        $recentQuotes = Quote::latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();
        $topServices = Service::withCount(['quotes as requests_count'])
            ->orderBy('requests_count', 'desc')
            ->take(5)
            ->get();

        $pages = [
            '/' => 'Accueil',
            'about' => 'À propos',
            'services' => 'Services',
            'quotes' => 'Devis',
            'contacts' => 'Contacts',
        ];

        return view(
            'dashboard',
            compact(
                'visits',
                'quotesCount',
                'contactsCount',
                'servicesCount',
                'skillsCount',
                'recentQuotes',
                'recentContacts',
                'topServices',
                'pages',
            ),
        );
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
        //
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class AdminQuotesController extends Controller
{
    //

    public function index()
    {
        $quotes = Quote::with('services')->get();
        return view('admin.quotes.index', compact('quotes'));
    }
    public function create()
    {
        return view('admin.quotes.create');
    }
    public function edit($id)
    {
        return view('admin.quotes.edit', compact('id'));
    }
    public function show($id)
    {
        $quote = Quote::with('services')->findOrFail($id);
        return view('admin.quotes.show', compact('quote'));
    }
    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->services()->detach();
        $quote->delete();
        return redirect()->route('dashboard.quotes.index')->with('success', 'Quote deleted successfully.');
    }
    public function store(Request $request)
    {
        // Logic to store the quote
        return redirect()->route('dashboard.quotes.index')->with('success', 'Quote created successfully.');
    }
    public function update(Request $request, $id)
    {
        // Logic to update the quote
        return redirect()->route('dashboard.quotes.index')->with('success', 'Quote updated successfully.');
    }
}

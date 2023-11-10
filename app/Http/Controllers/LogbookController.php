<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogbookRequest;
use App\Models\Logbook;
use Illuminate\Http\Request;

class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logbooks = Logbook::latest()->paginate(5);
        return view('user.logbook.index', compact('logbooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.logbook.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLogbookRequest $request)
    {
        Logbook::create($request->all());

        return redirect()->route('logbooks.index')->with('store_success', 'Logbook berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Logbook $logbook)
    {
        return view('user.logbook.show', compact('logbook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logbook $logbook)
    {
        return view('user.logbook.edit', compact('logbook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Logbook $logbook)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $logbook->update($request->all());

        return redirect()->route('logbooks.index')->with('success', 'Logbook berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logbook $logbook)
    {
        $logbook->delete();

        return redirect()->route('logbooks.index')->with('destroy_success', 'Logbook berhasil dihapus');
    }
}

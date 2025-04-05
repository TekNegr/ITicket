<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the tickets.
     */
    public function index()
    {
        $tickets = Ticket::where('id_employe', Auth::user()->id)->get();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new ticket.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created ticket in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'statut' => 'required|in:Ouvert,En cours,Résolu,Fermé',
            'priorite' => 'required|in:Faible,Moyenne,Élevée,Critique',
            'id_employe' => 'required|exists:users,id',
            'id_technicien' => 'nullable|exists:users,id',
        ]);

        Log::info('Creating a new ticket', $validated);

        Ticket::create($validated);

        return redirect()->route('tickets.index')->with('success', 'Ticket créé avec succès.');
    }

    /**
     * Display the specified ticket.
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified ticket.
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified ticket in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'statut' => 'required|in:Ouvert,En cours,Résolu,Fermé',
            'priorite' => 'required|in:Faible,Moyenne,Élevée,Critique',
            'id_employe' => 'required|exists:users,id',
            'id_technicien' => 'nullable|exists:users,id',
        ]);
        dd($validated);

        $ticket->update($validated);

        return redirect()->route('tickets.index')->with('success', 'Ticket mis à jour avec succès.');
    }

    /**
     * Remove the specified ticket from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket supprimé avec succès.');
    }
}
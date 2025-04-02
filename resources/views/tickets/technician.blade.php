@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tickets à traiter</h1>

    <!-- Affichage de tous les tickets -->
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Priorité</th>
                <th>Créé par</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->titre }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->statut }}</td>
                    <td>{{ $ticket->priorite }}</td>
                    <td>{{ $ticket->employe->name ?? 'Inconnu' }}</td>
                    <td>{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-primary btn-sm">Voir</a>
                        <form action="{{ route('tickets.update', $ticket) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="statut" value="En cours">
                            <button type="submit" class="btn btn-warning btn-sm">Marquer comme En cours</button>
                        </form>
                        <form action="{{ route('tickets.update', $ticket) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="statut" value="Résolu">
                            <button type="submit" class="btn btn-success btn-sm">Marquer comme Résolu</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Aucun ticket trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
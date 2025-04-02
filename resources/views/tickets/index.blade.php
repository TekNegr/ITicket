@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Tickets</h1>

    <!-- Affichage des tickets créés par l'employé -->
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Priorité</th>
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
                    <td>{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-primary btn-sm">Voir</a>
                        <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce ticket ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Aucun ticket trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Formulaire pour ajouter un nouveau ticket -->
    <h2>Créer un nouveau ticket</h2>
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="statut">Statut</label>
            <select name="statut" id="statut" class="form-control" required>
                <option value="Ouvert">Ouvert</option>
                <option value="En cours">En cours</option>
                <option value="Résolu">Résolu</option>
                <option value="Fermé">Fermé</option>
            </select>
        </div>
        <div class="form-group">
            <label for="priorite">Priorité</label>
            <select name="priorite" id="priorite" class="form-control" required>
                <option value="Faible">Faible</option>
                <option value="Moyenne">Moyenne</option>
                <option value="Élevée">Élevée</option>
                <option value="Critique">Critique</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</div>
@endsection
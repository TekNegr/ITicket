<!-- filepath: c:\Users\ADMIN\Documents\ECE\devops\Projet_devops\ITicket\resources\views\tickets\index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 px-4 bg-green-50 py-6 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-center mb-8">Mes Tickets</h1>

    <!-- Affichage des tickets créés par l'employé -->
    <div class="bg-white shadow-md rounded-lg mb-8">
        <div class="bg-blue-500 text-white px-6 py-3 rounded-t-lg">
            <h5 class="text-lg font-semibold">Liste des Tickets</h5>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Titre</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Statut</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Priorité</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Date de création</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $ticket)
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-300 px-4 py-2">{{ $ticket->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $ticket->titre }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ Str::limit($ticket->description, 50) }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="px-2 py-1 rounded text-white 
                                        @if($ticket->statut == 'Ouvert') bg-blue-500 
                                        @elseif($ticket->statut == 'En cours') bg-yellow-500 
                                        @elseif($ticket->statut == 'Résolu') bg-green-500 
                                        @else bg-gray-500 @endif">
                                        {{ $ticket->statut }}
                                    </span>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="px-2 py-1 rounded text-white 
                                        @if($ticket->priorite == 'Faible') bg-blue-300 
                                        @elseif($ticket->priorite == 'Moyenne') bg-blue-500 
                                        @elseif($ticket->priorite == 'Élevée') bg-yellow-500 
                                        @else bg-red-500 @endif">
                                        {{ $ticket->priorite }}
                                    </span>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                                <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                                    <a href="{{ route('tickets.show', $ticket) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Voir</a>
                                    <a href="{{ route('tickets.edit', $ticket) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Modifier</a>
                                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce ticket ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-gray-500 py-4">Aucun ticket trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Formulaire pour ajouter un nouveau ticket -->
    <div class="bg-white shadow-md rounded-lg">
        <div class="bg-green-500 text-white px-6 py-3 rounded-t-lg">
            <h5 class="text-lg font-semibold">Créer un nouveau ticket</h5>
        </div>
        <div class="p-6">
            <form action="{{ route('tickets.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="titre" class="block text-gray-700 font-medium mb-2">Titre</label>
                    <input type="text" name="titre" id="titre" class="w-full border border-gray-300 rounded-lg px-4 py-2" placeholder="Entrez le titre du ticket" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                    <textarea name="description" id="description" class="w-full border border-gray-300 rounded-lg px-4 py-2" rows="4" placeholder="Décrivez le problème" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="statut" class="block text-gray-700 font-medium mb-2">Statut</label>
                    <select name="statut" id="statut" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                        <option value="Ouvert">Ouvert</option>
                        <option value="En cours">En cours</option>
                        <option value="Résolu">Résolu</option>
                        <option value="Fermé">Fermé</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="priorite" class="block text-gray-700 font-medium mb-2">Priorité</label>
                    <select name="priorite" id="priorite" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                        <option value="Faible">Faible</option>
                        <option value="Moyenne">Moyenne</option>
                        <option value="Élevée">Élevée</option>
                        <option value="Critique">Critique</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-green-500 text-white font-medium py-2 rounded-lg hover:bg-green-600">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection
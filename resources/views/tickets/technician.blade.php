<!-- filepath: c:\Users\ADMIN\Documents\ECE\devops\Projet_devops\ITicket\resources\views\tickets\technician.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 px-4">
    <h1 class="text-3xl font-bold text-center mb-8">Tickets à traiter</h1>

    <!-- Affichage de tous les tickets -->
    <div class="bg-white shadow-md rounded-lg">
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
                            <th class="border border-gray-300 px-4 py-2 text-left">Créé par</th>
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
                                <td class="border border-gray-300 px-4 py-2">{{ $ticket->employe->name ?? 'Inconnu' }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                                <td class="border border-gray-300 px-4 py-2 flex flex-col space-y-2">
                                    <a href="{{ route('tickets.show', $ticket) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-center">Voir</a>
                                    <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="statut" value="En cours">
                                        <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 w-full">Marquer comme En cours</button>
                                    </form>
                                    <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="statut" value="Résolu">
                                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 w-full">Marquer comme Résolu</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-gray-500 py-4">Aucun ticket trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
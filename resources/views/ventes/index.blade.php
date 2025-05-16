@extends('layouts.app')

@section('title', 'Liste des Ventes')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des Ventes</h2>
        <a href="{{ url('/ventes/create') }}" class="btn btn-primary">Ajouter une vente</a>
    </div>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Total (€)</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ventes as $vente)
            <tr>
                <td>{{ $vente->id }}</td>
                <td>{{ $vente->produit->nom }}</td>
                <td>{{ $vente->quantite }}</td>
                <td>{{ number_format($vente->total, 2, ',', '.') }}</td>
                <td>{{ $vente->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ url('/ventes/'.$vente->id.'/edit') }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ url('/ventes/'.$vente->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

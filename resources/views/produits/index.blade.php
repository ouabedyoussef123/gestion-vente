@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des Produits</h2>
        <a href="{{ url('/produits/create') }}" class="btn btn-primary">Ajouter un produit</a>
    </div>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Prix (€)</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($produits as $produit)
            <tr>
                <td>{{ $produit->id }}</td>
                <td>{{ $produit->nom }}</td>
                <td>{{ $produit->categorie }}</td>
                <td>{{ number_format($produit->prix, 2, ',', '.') }}</td>
                <td>{{ $produit->quantite }}</td>
                <td>
                    <a href="{{ url('/produits/'.$produit->id.'/edit') }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ url('/produits/'.$produit->id) }}" method="POST" class="d-inline">
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

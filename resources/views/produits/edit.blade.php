@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Produit</h1>

    <form method="POST" action="{{ route('produits.update', $produit->id) }}">
        @csrf
        @method('PUT')

        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $produit->nom }}" required><br>

        <label>Catégorie :</label>
        <input type="text" name="categorie" value="{{ $produit->categorie }}" required><br>

        <label>Prix :</label>
        <input type="number" step="0.01" name="prix" value="{{ $produit->prix }}" required><br>

        <label>Quantité :</label>
        <input type="number" name="quantite" value="{{ $produit->quantite }}" required><br>

        <button type="submit">Mettre à jour</button>
    </form>
</div>
@endsection

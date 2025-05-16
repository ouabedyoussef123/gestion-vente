@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Produit</h1>

    <form method="POST" action="{{ route('produits.store') }}">
        @csrf

        <label>Nom :</label>
        <input type="text" name="nom" required><br>

        <label>Catégorie :</label>
        <input type="text" name="categorie" required><br>

        <label>Prix :</label>
        <input type="number" step="0.01" name="prix" required><br>

        <label>Quantité :</label>
        <input type="number" name="quantite" required><br>

        <button type="submit">Ajouter</button>
    </form>
</div>
@endsection

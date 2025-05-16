@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la vente #{{ $vente->id }}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('ventes.update', $vente) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="produit_id" class="form-label">Produit</label>
            <select name="produit_id" id="produit_id" class="form-control" required>
                <option value="">-- Choisir un produit --</option>
                @foreach($produits as $produit)
                    <option value="{{ $produit->id }}" {{ (old('produit_id', $vente->produit_id) == $produit->id) ? 'selected' : '' }}>
                        {{ $produit->nom }} (Prix: €{{ number_format($produit->prix, 2) }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" name="quantite" id="quantite" class="form-control" min="1" value="{{ old('quantite', $vente->quantite) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('ventes.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection

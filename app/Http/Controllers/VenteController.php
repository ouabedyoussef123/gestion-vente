<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Models\Produit;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    /**
     * Affiche la liste des ventes.
     */
    public function index()
    {
        // Charger toutes les ventes avec leur produit associé pour affichage
        $ventes = Vente::with('produit')->orderBy('created_at', 'desc')->paginate(10);
        return view('ventes.index', compact('ventes'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle vente.
     */
    public function create()
    {
        // On a besoin de la liste des produits pour le select dans le formulaire
        $produits = Produit::all();
        return view('ventes.create', compact('produits'));
    }

    /**
     * Enregistre une nouvelle vente dans la base.
     */
    public function store(Request $request)
    {
        // Validation des données envoyées
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
        ]);

        $produit = Produit::findOrFail($request->produit_id);
        $total = $produit->prix * $request->quantite;

        // Création de la vente
        Vente::create([
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite,
            'total' => $total,
        ]);

        return redirect()->route('ventes.index')->with('success', 'Vente ajoutée avec succès.');
    }

    /**
     * Affiche le formulaire d'édition d'une vente.
     */
    public function edit(Vente $vente)
    {
        $produits = Produit::all();
        return view('ventes.edit', compact('vente', 'produits'));
    }

    /**
     * Met à jour une vente existante.
     */
    public function update(Request $request, Vente $vente)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
        ]);

        $produit = Produit::findOrFail($request->produit_id);
        $total = $produit->prix * $request->quantite;

        $vente->update([
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite,
            'total' => $total,
        ]);

        return redirect()->route('ventes.index')->with('success', 'Vente mise à jour avec succès.');
    }

    /**
     * Supprime une vente.
     */
    public function destroy(Vente $vente)
    {
        $vente->delete();
        return redirect()->route('ventes.index')->with('success', 'Vente supprimée avec succès.');
    }
}

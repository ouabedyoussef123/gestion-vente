<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'quantite',
        'total',
    ];

    /**
     * Relation vers le produit lié à la vente.
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    /**
     * Optionnel : calculer automatiquement le total si ce n'est pas fourni.
     * Appelé par exemple dans un observer ou dans le contrôleur.
     */
    public function calculerTotal()
    {
        if ($this->produit) {
            $this->total = $this->quantite * $this->produit->prix;
        }
    }
}

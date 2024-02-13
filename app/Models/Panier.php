<?php
/// App\Models\Panier.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'product_id',
        'commande_id',
        'quantity',
    ];

    // Indique que la colonne 'commande_id' peut être nulle
    protected $attributes = [
        'commande_id' => null,
    ];

    /**
     * Relation avec la table de produits.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Relation avec la table de commandes.
     */
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }
}

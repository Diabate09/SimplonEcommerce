<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'subtotal',
        'totalPrice',
    ];

    /**
     * Relation avec la table de panier (cart).
     */
    public function paniers()
    {
        return $this->hasMany(Panier::class, 'commande_id');
    }
}

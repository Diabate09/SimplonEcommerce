<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'active'];

    // Utilisation d'un cast pour le prix
    protected $casts = [
        'price' => 'decimal:2', // par exemple, définissez le nombre de décimales selon vos besoins
    ];


}



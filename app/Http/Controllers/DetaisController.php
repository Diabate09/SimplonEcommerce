<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class DetaisController extends Controller
{
    //
    public function detailsShow(){
        return view('details');
    }

public function showProductDetails($id)
{
    // Récupérer le produit depuis la base de données en fonction de l'ID
    $product = Product::findOrFail($id);

    // Passer le produit à la vue
    return view('details')->with('product', $product);
}

}

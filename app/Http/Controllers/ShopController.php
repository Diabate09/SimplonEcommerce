<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
    //
    public function ShopProduit()
    {
        $products = Product::paginate(12);

        return view('shop', compact('products'));
    }
}

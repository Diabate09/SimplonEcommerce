<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function serviceService()
    {
        $products = Product::paginate(3);

        return view('service', compact('products'));
    }
}

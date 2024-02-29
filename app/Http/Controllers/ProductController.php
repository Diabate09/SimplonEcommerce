<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Commande;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\DB;
require('sendMail/index.php');

class ProductController extends Controller

{
    public function index()
    {
        $products = Product::paginate(12);

        $cart = DB::table("cart")->where("status" , "=" , false )->get() ;

        return view('welcome', compact('products' , 'cart'));
    }
    public function create()
    {
        return view('products_create');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Effectuez la recherche dans la base de données ou tout autre traitement nécessaire
        $products = Product::where('name', 'like', '%' . $query . '%')->get();

        // Si la requête est AJAX, renvoyez les résultats sous forme de JSON
        /*if ($request->ajax()) {
            return response()->json(['products' => $products]);
        }*/

        // Sinon, renvoyez la vue normale avec les résultats
        return view('welcome', compact('products'));

        //return response()->json(['products' => $products]);
    }

    // ...

    public function cartShow($id)
    {
        if ($id) {
            $product = Product::findOrFail($id);

           // var_dump($product) ;
           // die();


            // if (isset($cart[$id])) {
            //     // Le produit est déjà dans le panier, incrémente la quantité
            //     $cart[$id]['quantity']++;
            // } else {
            //     // Le produit n'est pas dans le panier, ajoute-le avec une quantité initiale de 1
            //     $cart[$id] = [
            //         'image' => $product->image,
            //         'name' => $product->name,
            //         'product_id'=>$product->id,
            //         'quantity' => 1,  // Initialisez la quantité à 1
            //         'price' => $product->price,
            //     ];
            // }

            // Mettre à jour la colonne "status" dans le modèle Panier
            $panier = new Panier;
            $panier->product_id = $product->id;
            $panier->quantity = 1;
            $panier->save();

            // Met à jour le panier dans la session
            // session()->put('cart', $cart);
            // session()->put('id', $id);

            // Redirige vers la vue du panier
            $cart = DB::table("cart")->where("status" , "=" , false )->get() ;
            return redirect()->route('elements.cart_show_show','cart');
        } else {
            // Si l'id n'est pas fourni dans la requête, redirige l'utilisateur vers la page d'accueil avec un message d'erreur
            return redirect()->route('home')->with('error', 'L\'identifiant du produit n\'a pas été spécifié.');
        }
    }



    public function Showcart()
    {

        // Récupérez le panier depuis la session
        $cart = DB::table('cart')
                ->join("products" , "cart.product_id" , "=" , "products.id")
                ->select("products.*" , "cart.quantity" , "cart.id as id_cart")
                ->where("status" , "=" , false)
                ->get() ;

        // Calculez la somme totale des achats
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item->quantity * $item->price;
        }

        // Passez le panier et la somme totale à la vue
        return view('addcart', compact('cart', 'totalPrice'));
    }




    public function showabout(){
        return view('about');
    }


    // ... autres méthodes du contrôleur ...


public function removeFromCart(Request $request, $id)
{
    // Logique de suppression du produit dans le panier (à adapter selon ta structure de données)
    // Par exemple, si tu utilises une session pour le panier :
    $cart = Panier::findOrFail($id) ;

    // Recherche du produit dans le panier
    if ($cart) {

        DB::table("cart")->where("id" , "=" , $id)->delete() ;

        // Redirection vers la page du panier ou autre
        return redirect()->route('elements.cart_show_show')->with('success', 'Produit supprimé du panier.');
    } else {
        // Redirection vers la page du panier avec un message d'erreur
        return redirect()->route('elements.cart_show_show')->with('error', 'Produit non trouvé dans le panier.');
    }
}
public function showCheckout() {

    // Récupérez les informations sur les produits depuis la session du panier
    $cart = DB::table('cart')
                ->join("products" , "cart.product_id" , "=" , "products.id")
                ->select("products.*" , "cart.quantity" , "cart.id as id_cart")
                ->where("status" , "=" , false)
                ->get() ;





    // Calculez le subtotal
    $subtotal = 0;
    foreach ($cart as $productId => $product) {

        $subtotal += $product->quantity * $product->price;

    }

    // Calculer le total (peut-être que vous devez ajouter des frais d'expédition ou d'autres coûts ici)
    $totalPrice = $subtotal; // Vous pouvez ajuster cela en fonction de vos besoins

    // Passer les données du panier, les productIds, le subtotal et le total à la vue
    return view('checkout', [
        'cart' => $cart,
        'subtotal' => $subtotal,
        'totalPrice' => $totalPrice
    ]);
}


public function showThankyou($commande_id)
    {
        // Récupérez les détails de la commande depuis la base de données
        $commande = Commande::find($commande_id);

        // Vérifiez si la commande existe
        if (!$commande) {
            abort(404); // Ou redirigez vers une page d'erreur 404
        }

        // Chargez la vue "thankyou" avec les détails de la commande
        return view('thankyou', compact('commande'));
    }

    public function passerCommande(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            // Ajoutez d'autres règles de validation selon vos besoins...
        ]);

        // Création d'une nouvelle instance de Commande avec les données du formulaire
        $commande = new Commande();
        $commande->first_name = $request->input('first_name');
        $commande->last_name = $request->input('last_name');
        $commande->email = $request->input('email');
        $commande->phone = $request->input('phone');
        $commande->address = $request->input('address');
        $commande->save();

        $cart = DB::table('cart')
                    ->where("status" , "=" , false )
                    ->get() ;

        foreach ($cart as $key => $value) {

            DB::table("cart")
                ->where("id" , "=" , $value->id)
                ->update(["status"=> true , "commande_id"=> $commande->id]) ;


        }


        // Envoi du courriel
        sendMail( $commande->email, "Miss Sali", "Informations sur votre commande", "Merci pour votre commande! Votre numéro de commande est : {$commande->id}");

        // Réinitialisez le panier après avoir enregistré la commande
        session()->forget('cart');

        // Redirection vers la page de remerciement avec l'identifiant de la commande
        return redirect()->route('thankyou.show', ['commande_id' => $commande->id]);
    }


    public function addquantityproductcart($id){

        $cart = Panier::findOrFail($id);

        if($cart) {

            DB::table('cart')
                ->where("id" , $id)
                ->update(["quantity" => $cart->quantity + 1]) ;
        }

        return redirect()->route('elements.cart_show_show');
    }
    public function addquantityproductcartM($id){
        $cart = Panier::findOrFail($id);

        if($cart) {

            DB::table('cart')
                ->where("id" , $id)
                ->update(["quantity" => $cart->quantity - 1]) ;
        }

        return redirect()->route('elements.cart_show_show');

    }






}





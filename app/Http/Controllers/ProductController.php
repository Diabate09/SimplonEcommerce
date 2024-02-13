<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Commande;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
require('sendMail/index.php');

class ProductController extends Controller

{
    public function index()
    {
        $products = Product::paginate(12);

        return view('welcome', compact('products'));
    }
    public function create()
    {
        return view('products_create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // ajustez les règles de validation pour les images
            'price' => 'required|numeric|min:0',
            'active' => 'boolean',
        ]);

        // Traitement de l'image
        $imagePath = $request->file('image')->store('images', 'public');
        $data['image'] = $imagePath;

        // Enregistrement du produit
        Product::create($data);

        return redirect()->route('products.create')->with('success', 'Produit enregistré avec succès.');
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
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                // Le produit est déjà dans le panier, incrémente la quantité
                $cart[$id]['quantity']++;
            } else {
                // Le produit n'est pas dans le panier, ajoute-le avec une quantité initiale de 1
                $cart[$id] = [
                    'image' => $product->image,
                    'name' => $product->name,
                    'product_id'=>$product->id,
                    'quantity' => 1,  // Initialisez la quantité à 1
                    'price' => $product->price,
                ];
            }

            // Met à jour le panier dans la session
            session()->put('cart', $cart);
            session()->put('id', $id);

            // Redirige vers la vue du panier
            return redirect()->route('elements.cart_show_show', ['id' => $id]);
        } else {
            // Si l'id n'est pas fourni dans la requête, redirige l'utilisateur vers la page d'accueil avec un message d'erreur
            return redirect()->route('home')->with('error', 'L\'identifiant du produit n\'a pas été spécifié.');
        }
    }





    public function Showcart()
    {
        // Récupérez le panier depuis la session
        $cart = session()->get('cart', []);

        // Calculez la somme totale des achats
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['quantity'] * $item['price'];
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
    $cart = $request->session()->get('cart', []);

    // Recherche du produit dans le panier
    if (isset($cart[$id])) {
        unset($cart[$id]);
        $request->session()->put('cart', $cart);

        // Redirection vers la page du panier ou autre
        return redirect()->route('elements.cart_show_show')->with('success', 'Produit supprimé du panier.');
    } else {
        // Redirection vers la page du panier avec un message d'erreur
        return redirect()->route('elements.cart_show_show')->with('error', 'Produit non trouvé dans le panier.');
    }
}
public function showCheckout() {
    // Récupérez les informations sur les produits depuis la session du panier
    $cart = session()->get('cart', []);

    // Initialiser un tableau pour stocker les productIds
    $productIds = [];

    var_dump($cart);
    die();



    // Calculez le subtotal
    $subtotal = 0;
    foreach ($cart as $productId => $product) {
        // Ajouter le productId au tableau
        $productIds[] = $productId;

        // Ajouter la quantité du produit au calcul du subtotal
        $subtotal += $product['quantity'] * $product['price'];
    }

    // Calculer le total (peut-être que vous devez ajouter des frais d'expédition ou d'autres coûts ici)
    $totalPrice = $subtotal; // Vous pouvez ajuster cela en fonction de vos besoins

    // Passer les données du panier, les productIds, le subtotal et le total à la vue
    return view('checkout', [
        'cart' => $cart,
        'subtotal' => $subtotal,
        'productIds' => $productIds,
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
            'subtotal' => 'required',
            'totalPrice' => 'required',
            // Ajoutez d'autres règles de validation selon vos besoins...
        ]);

        // Création d'une nouvelle instance de Commande avec les données du formulaire
        $commande = new Commande();
        $commande->first_name = $request->input('first_name');
        $commande->last_name = $request->input('last_name');
        $commande->email = $request->input('email');
        $commande->phone = $request->input('phone');
        $commande->address = $request->input('address');
        $commande->subtotal = $request->input('subtotal');
        $commande->totalPrice = $request->input('totalPrice');
        $commande->save();

        // Récupérez les IDs des produits dans le panier
        $productIds = session()->get('cart', []);
        foreach ($productIds as $productId => $quantity) {
            // Assurez-vous que $quantity est un nombre (entier ou décimal)
            $quantity = (int)$quantity;

            Panier::create([
                'product_id' => $productId,
                'quantity' => $quantity,
                'commande_id' => $commande->id,
            ]);
        }

        // Mettez à jour la commande dans la table `cart` avec l'id de la commande
        Panier::where('commande_id', null)->update(['commande_id' => $commande->id]);
        // Envoi du courriel
        sendMail( $commande->email, "Miss Sali", "Informations sur votre commande", "Merci pour votre commande! Votre numéro de commande est : {$commande->id}");

        // Réinitialisez le panier après avoir enregistré la commande
        session()->forget('cart');

        // Redirection vers la page de remerciement avec l'identifiant de la commande
        return redirect()->route('thankyou.show', ['commande_id' => $commande->id]);
    }






}





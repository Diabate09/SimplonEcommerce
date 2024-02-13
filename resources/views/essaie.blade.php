<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mon Panier</title>
    <!-- Inclure Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Mon Panier</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produit</th>
            <th scope="col">Quantité</th>
            <th scope="col">Prix unitaire</th>
            <th scope="col">Total</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <!-- Produit 1 -->
        <tr>
            <th scope="row">1</th>
            <td>Produit 1</td>
            <td>
                <input type="number" value="2" min="1" class="quantity-input">
            </td>
            <td class="unit-price">$30.00</td>
            <td class="total-price">$30.00</td>
            <td>
                <button class="btn btn-danger btn-sm">Supprimer</button>
            </td>
        </tr>
        <!-- Produit 2 -->
        @foreach($cart as $productId => $product)
        <tr id="cart-row-{{ $productId }}">
            <td class="product-thumbnail">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid">
            </td>
            <td class="product-name">
                <h2 class="h5 text-black">{{ $product['name'] }}</h2>
            </td>
            <td>FCFA{{ $product['price'] }}</td>
            <td>
                <input type="number" value="2" min="1" class="quantity-input">
            </td>

            <td class="unit-price" data-price="{{ $product['price'] * max(1, $product['quantity']) }}">FCFA{{ $product['quantity'] * $product['price'] }}</td>
            <td>
                <!-- Lien de suppression avec une classe btn et btn-sm pour le style -->
                <a href="{{ route('elements.remove_cart', ['id' => $productId]) }}" class="btn btn-black btn-sm">X</a>
            </td>
        </tr>
    @endforeach
        <!-- Ajoutez plus de lignes ici pour d'autres produits -->
        </tbody>
    </table>

    <div class="text-right">
        <h4 id="cart-total">Total: $55.00</h4>
        <button class="btn btn-primary">Payer</button>
    </div>
</div>

<!-- Inclure Bootstrap JS (jQuery est requis pour Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        // Gestion des changements de quantité
        $('.quantity-input').change(function () {
            updateTotal();
        });

        function updateTotal() {
            var total = 0;

            // Parcours de chaque ligne du panier
            $('tbody tr').each(function () {
                var quantity = parseInt($(this).find('.quantity-input').val());
                var unitPrice = parseFloat($(this).find('.unit-price').text().replace('$', ''));
                var totalPrice = quantity * unitPrice;

                // Mise à jour du prix total pour chaque produit
                $(this).find('.total-price').text('$' + totalPrice.toFixed(2));

                // Ajout du prix total au total général
                total += totalPrice;
            });

            // Mise à jour du total général
            $('#cart-total').text('Total: $' + total.toFixed(2));
        }
    });
</script>

</body>
</html>

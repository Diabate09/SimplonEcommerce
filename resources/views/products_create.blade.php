<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/products/create.blade.php -->

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Nom du produit:</label>
    <input type="text" name="name" required>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea>

    <label for="image">Image:</label>
    <input type="file" name="image" accept="image/*" required>

    <label for="price">Prix:</label>
    <input type="number" name="price" step="0.01" required>

    <label for="active">Actif:</label>
    <input type="checkbox" name="active" checked>

    <button type="submit">Enregistrer</button>
</form>

</body>
</html>

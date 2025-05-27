<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <a href="index.php?page=product" class="btn btn-secondary mb-3">← Back to Product List</a>
        <h2>Edit Product</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?= htmlspecialchars($product['name']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price">Price:</label>
                <input type="number" step="0.01" name="price" id="price" value="<?= htmlspecialchars($product['price']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="<?= htmlspecialchars($product['quantity']) ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>

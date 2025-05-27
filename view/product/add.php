<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <a href="index.php?page=product" class="btn btn-secondary mb-3">← Back to Product List</a>
        <h2>Add Product</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="index.php?page=product" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

</html>
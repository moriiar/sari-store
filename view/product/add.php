<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="assets/bootstrap.min.css"></head>
<body>
<div class="container mt-4">
    <h2>Add Product</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Name</label><input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Price</label><input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Quantity</label><input type="number" name="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="index.php?page=product" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
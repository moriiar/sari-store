<?php
$product = null;
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="assets/bootstrap.min.css"></head>
<body>
<div class="container mt-4">
    <h2>Edit Product</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <div class="mb-3">
            <label>Name</label><input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Price</label><input type="number" step="0.01" name="price" class="form-control" value="<?= $product['price'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Quantity</label><input type="number" name="quantity" class="form-control" value="<?= $product['quantity'] ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php?page=product" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
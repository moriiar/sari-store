<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-4">
    <h2>Product List</h2>
    <a href="index.php?page=product&action=add" class="btn btn-success mb-3">Add Product</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Actions</th></tr></thead>
        <tbody>
            <?php while ($row = $products->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td>
                        <a href="index.php?page=product&action=edit&id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="index.php?page=product&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
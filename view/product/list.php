<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row align-items-center mb-3">
            <div class="col-auto">
                <a href="index.php" class="btn btn-secondary">← Back to Home</a>
            </div>
            <div class="col text-center">
                <h2 class="mb-0">Product List</h2>
            </div>
            <div class="col-auto text-end">
                <a href="index.php?page=product&action=add" class="btn btn-success">Add Product</a>
            </div>
        </div>
        <table class="table table-bordered table-striped" id="productTable">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $products->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= number_format($row['price'], 2) ?></td>
                        <td><?= htmlspecialchars($row['quantity']) ?></td>
                        <td>
                            <a href="index.php?page=product&action=edit&id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="index.php?page=product&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable();
        });
    </script>
</body>

</html>
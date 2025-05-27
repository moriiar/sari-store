<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <a href="index.php" class="btn btn-secondary mb-3">← Back to Home</a>
        <h2>Sales</h2>
        <a href="index.php?page=sales&action=report" class="btn btn-info">View Monthly Report</a>


        <form action="controller/SalesController.php?action=add" method="POST" class="mt-4">
            <h3>Add Sale</h3>
            <div id="items">
                <div class="item mb-3">
                    <label for="product_id_0">Product ID:</label>
                    <input type="number" id="product_id_0" name="items[0][product_id]" placeholder="Product ID" required class="form-control">

                    <label for="qty_0">Quantity:</label>
                    <input type="number" id="qty_0" name="items[0][qty]" placeholder="Quantity" required min="1" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Sale</button>
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <div id="msg" class="alert alert-success d-inline-block mb-3">
                    ✅ Sale successfully added!
                </div>
            <?php elseif (isset($_GET['error']) && !empty($_GET['error'])): ?>
                <div id="msg" class="alert alert-danger d-inline-block mb-3">
                    ❌ <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php endif; ?>

            <script>
                setTimeout(() => {
                    const msg = document.getElementById('msg');
                    if (msg) msg.style.display = 'none';
                }, 2000); // 2 seconds
            </script>
        </form>
    </div>
</body>

</html>
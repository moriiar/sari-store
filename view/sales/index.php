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
                    <input type="hidden" name="items[0][product_id]" value="1"> <!-- Replace with actual product ID -->
                    <label for="qty_0">Quantity:</label>
                    <input type="number" id="qty_0" name="items[0][qty]" placeholder="Quantity" required min="1" class="form-control">

                    <label for="price_0">Price:</label>
                    <input type="text" id="price_0" name="items[0][price]" placeholder="Price" required class="form-control">
                </div>
                <!-- You can add more items here as needed -->
            </div>
            <button type="submit" class="btn btn-primary">Add Sale</button>
        </form>
    </div>
</body>
</html>
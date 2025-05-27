<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'product':
        require 'controller/ProductController.php';
        break;
    case 'sales':
        // Placeholder for future SalesController
        echo "<h2>Sales Page (Coming Soon)</h2>";
        break;
    case 'home':
    default:
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Sari-Sari Store Management</title>
            <link rel="stylesheet" href="assets/bootstrap.min.css">
        </head>

        <body>
            <div class="container text-center mt-5">
                <h1>SARI-SARI STORE MANAGEMENT SYSTEM</h1>
                <div class="mt-4">
                    <a href="index.php?page=product" class="btn btn-primary btn-lg m-2">Products</a>
                    <a href="index.php?page=sales" class="btn btn-success btn-lg m-2">Sales</a>
                </div>
            </div>
        </body>

        </html>
<?php
        break;
}

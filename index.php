<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'product':
        require 'controller/ProductController.php';
        break;
    case 'sales':
        require 'controller/SalesController.php';
        break;
    case 'home':
    default:
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
?>
<?php
$page = $_GET['page'] ?? 'product';

switch ($page) {
    case 'product':
        require 'controller/ProductController.php';
        break;
    default:
        echo "<h1>404 Page Not Found</h1>";
        break;
}

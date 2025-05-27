<?php
require_once './config/database.php';
require_once './model/Product.php';

$db = new Database();
$conn = $db->getConnection();
$productModel = new Product($conn);

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'add':
        if ($_POST) {
            $productModel->add($_POST['name'], $_POST['price'], $_POST['quantity']);
            header("Location: index.php?page=product");
        }
        include './view/product/add.php';
        break;

    case 'edit':
        // Add edit logic here
        break;

    case 'delete':
        $productModel->delete($_GET['id']);
        header("Location: index.php?page=product");
        break;

    default:
        $products = $productModel->getAll();
        include './view/product/list.php';
}
?>

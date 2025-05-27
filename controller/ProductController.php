<?php
require_once 'config/database.php';
require_once 'model/Product.php';

$db = new Database();
$conn = $db->getConnection();

$productModel = new Product($conn);
$action = $_GET['action'] ?? '';

switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productModel->add($_POST['name'], $_POST['price'], $_POST['quantity']);
            header('Location: index.php?page=product');
            exit;
        }
        include 'view/product/add.php';
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Missing product ID.";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productModel->update($id, $_POST['name'], $_POST['price'], $_POST['quantity']);
            header('Location: index.php?page=product');
            exit;
        }

        $product = $productModel->getById($id);
        if (!$product) {
            echo "Product not found.";
            exit;
        }

        include 'view/product/edit.php';
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productModel->delete($id);
        }
        header('Location: index.php?page=product');
        exit;

    default:
        $products = $productModel->getAll();
        include 'view/product/list.php';
        break;
}

<?php
require_once './config/database.php';
require_once './model/Sales.php';

$db = new Database();
$conn = $db->getConnection();
$sales = new Sales($conn);
$action = $_GET['action'] ?? '';

switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $items = $_POST['items'] ?? [];
            $total = array_reduce($items, fn($sum, $item) => $sum + ($item['qty'] * $item['price']), 0);
            $saleId = $sales->createSale($total);

            foreach ($items as $item) {
                $subtotal = $item['qty'] * $item['price'];
                $sales->addSaleItem($saleId, $item['product_id'], $item['qty'], $item['price'], $subtotal);
            }
            echo "Sale recorded successfully!";
        } else {
            include './view/sales/transactions.php';
        }
        break;

    case 'report':
        $month = (int) ($_GET['month'] ?? date('m'));
        $year = (int) ($_GET['year'] ?? date('Y'));
        $report = $sales->getMonthlyReport($month, $year);
        include './view/sales/report.php';
        break;

    default:
        echo "Invalid sales action.";
        break;
}
?>
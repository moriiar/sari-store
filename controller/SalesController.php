<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Sales.php';

$db = new Database();
$conn = $db->getConnection();
$sales = new Sales($conn);
$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'add') {
    $items = $_POST['items'] ?? [];

    $total = 0;
    foreach ($items as $item) {
        // Fetch the price from the products table
        $stmt = $conn->prepare("SELECT price FROM products WHERE id = :id");
        $stmt->bindParam(':id', $item['product_id']);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            $errorMsg = urlencode("Product not found with ID " . $item['product_id']);
            header("Location: /sari-store/index.php?page=sales&error=$errorMsg");
            exit;
        }

        $price = (float) $product['price'];
        $subtotal = $price * $item['qty'];
        $total += $subtotal;

        // Temporarily store for reuse below
        $item['price'] = $price;
        $item['subtotal'] = $subtotal;
        $updatedItems[] = $item;
    }

    // Create sale
    $saleId = $sales->createSale($total);
    error_log("Sale ID created: " . $saleId);

    $conn->beginTransaction();

    try {
        $saleId = $sales->createSale($total);

        if ($saleId > 0) {
            foreach ($updatedItems as $item) {
                $sales->addSaleItem($saleId, $item['product_id'], $item['qty'], $item['price'], $item['subtotal']);

                // Decrease quantity for each product
                $success = $sales->decreaseProductQuantity($item['product_id'], $item['qty']);
                if (!$success) {
                    throw new Exception("Not enough stock for product ID " . $item['product_id']);
                }
            }

            $conn->commit();
            header("Location: ../index.php?page=sales&success=1");
            exit;
        } else {
            $conn->rollBack();
            header("Location: ../index.php?page=sales&error=1");
            exit;
        }
    } catch (Exception $e) {
        $conn->rollBack();
        $errorMsg = urlencode($e->getMessage());
        header("Location: ../index.php?page=sales&error=$errorMsg");
        exit;
    }
}

switch ($action) {
    case 'report':
        $month = (int) ($_GET['month'] ?? date('m'));
        $year = (int) ($_GET['year'] ?? date('Y'));
        $report = $sales->getMonthlyReport($month, $year);
        include './view/sales/report.php';
        break;

    case 'export':
        $month = (int) ($_GET['month'] ?? date('m'));
        $year = (int) ($_GET['year'] ?? date('Y'));
        $report = $sales->getMonthlyReport($month, $year);

        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=\"sales_report_{$year}_{$month}.csv\"");

        $output = fopen("php://output", "w");
        fputcsv($output, ['Date', 'Product', 'Qty', 'Price', 'Subtotal']); // Column headers

        foreach ($report as $row) {
            fputcsv($output, [
                $row['created_at'],
                $row['product_name'],
                $row['quantity'],
                $row['price'],
                $row['subtotal']
            ]);
        }

        fclose($output);
        exit;

    default:
        include './view/sales/index.php';
        break;
}

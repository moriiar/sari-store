<?php
class Sales {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createSale(float $totalAmount): int {
        try {
            $stmt = $this->conn->prepare("INSERT INTO sales (total_amount) VALUES (:total_amount)");
            $stmt->bindParam(':total_amount', $totalAmount);
            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error creating sale: " . $e->getMessage()); 
            return 0;
        }
    }

    public function addSaleItem(int $saleId, int $productId, int $quantity, float $price, float $subtotal): bool {
        try {
            $stmt = $this->conn->prepare("INSERT INTO sale_items (sale_id, product_id, quantity, price, subtotal) VALUES (:sale_id, :product_id, :quantity, :price, :subtotal)");
            $stmt->bindParam(':sale_id', $saleId);
            $stmt->bindParam(':product_id', $productId);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':subtotal', $subtotal);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error adding sale item: " . $e->getMessage()); 
            return false; 
        }
    }

    public function getMonthlyReport(int $month, int $year): array {
        $stmt = $this->conn->prepare("CALL sp_get_monthly_sales_report(:month, :year)");
        $stmt->bindParam(':month', $month);
        $stmt->bindParam(':year', $year);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
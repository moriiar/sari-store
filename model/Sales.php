<?php
class Sales {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createSale(float $totalAmount): int {
        $stmt = $this->conn->prepare("CALL sp_add_sale(:total_amount)");
        $stmt->bindParam(':total_amount', $totalAmount);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function addSaleItem(int $saleId, int $productId, int $quantity, float $price, float $subtotal): void {
        $stmt = $this->conn->prepare("CALL sp_add_sale_item(:sale_id, :product_id, :qty, :price, :subtotal)");
        $stmt->bindParam(':sale_id', $saleId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':qty', $quantity);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':subtotal', $subtotal);
        $stmt->execute();
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
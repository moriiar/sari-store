<?php
class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("CALL sp_get_all_products()");
        $stmt->execute();
        return $stmt;
    }

    public function add($name, $price, $quantity) {
        $stmt = $this->conn->prepare("CALL sp_add_product(?, ?, ?)");
        $stmt->execute([$name, $price, $quantity]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("CALL sp_delete_product(?)");
        $stmt->execute([$id]);
    }

    public function update($id, $name, $price, $quantity) {
        $stmt = $this->conn->prepare("CALL sp_update_product(?, ?, ?, ?)");
        $stmt->execute([$id, $name, $price, $quantity]);
    }
}
?>

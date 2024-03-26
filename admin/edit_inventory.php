<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get form data
        $inventoryId = $_POST['editInventoryId'];
        $productName = $_POST['editProductName'];
        $quantity = $_POST['editQuantity'];
        $supplierId = $_POST['editSupplier'];
        $price = $_POST['editPrice'];
        $size = $_POST['editSize'];
        $type = $_POST['editType'];

        // Update the database
        $stmt = $conn->prepare("UPDATE inventory SET 
            product_name = :product_name, 
            quantity = :quantity, 
            supplier_id = :supplier_id, 
            price = :price, 
            size = :size, 
            type = :type 
            WHERE inventory_id = :inventory_id");

        $stmt->bindParam(':product_name', $productName);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':supplier_id', $supplierId);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':inventory_id', $inventoryId);
        $stmt->execute();

        // Return success message
        echo json_encode(["status" => "success", "message" => "Inventory updated successfully"]);
    } catch (PDOException $e) {
        // Return error message
        echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
    }
} else {
    // Return invalid request message
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>

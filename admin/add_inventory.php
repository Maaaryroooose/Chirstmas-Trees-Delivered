<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get form data
        $productName = $_POST['addProductName'];
        $quantity = $_POST['addQuantity'];
        $supplierId = $_POST['addSupplier'];
        $price = $_POST['addPrice'];
        $size = $_POST['addSize'];
        $type = $_POST['addType'];

        // Add other fields as needed

        // Insert new inventory into the database
        $stmt = $conn->prepare("INSERT INTO inventory (product_name, quantity, supplier_id, price, size, type) 
                                VALUES (:product_name, :quantity, :supplier_id, :price, :size, :type)");
        $stmt->bindParam(':product_name', $productName);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':supplier_id', $supplierId);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':type', $type);
        $stmt->execute();

        // Return success message
        echo json_encode(["status" => "success", "message" => "Inventory added successfully"]);
    } catch (PDOException $e) {
        // Return error message
        echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
    }
} else {
    // Return invalid request message
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>

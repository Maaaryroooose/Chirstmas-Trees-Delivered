<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inventoryId'])) {
    try {
        $inventoryId = $_POST['inventoryId'];

        // Fetch inventory details based on inventory_id
        $stmt = $conn->prepare("SELECT * FROM inventory WHERE inventory_id = :inventory_id");
        $stmt->bindParam(':inventory_id', $inventoryId);
        $stmt->execute();
        $inventory = $stmt->fetch(PDO::FETCH_ASSOC);

        // Return inventory details as JSON
        echo json_encode($inventory);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    // Handle other cases or redirect to an error page
    echo 'Invalid request method or missing parameters.';
}
?>

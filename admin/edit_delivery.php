<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get form data
        $deliveryId = $_POST['editDeliveryId'];
        // Get other fields as needed
        $newStatus = isset($_POST['newStatus']) ? $_POST['newStatus'] : null;
        // Get other edited fields

        // Update the database
        $stmt = $conn->prepare("UPDATE delivery SET status = :status WHERE delivery_id = :delivery_id");
        $stmt->bindParam(':status', $newStatus);
        // Bind other fields as needed
        $stmt->bindParam(':delivery_id', $deliveryId);
        $stmt->execute();

        // Return success message
        echo json_encode(["status" => "success", "message" => "Delivery updated successfully"]);
    } catch (PDOException $e) {
        // Return error message
        echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
    }
} else {
    // Return invalid request message
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>

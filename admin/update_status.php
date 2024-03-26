<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get delivery ID and status from POST data
    $deliveryId = $_POST['delivery_id'];
    $status = $_POST['status'];

    try {
        // Prepare SQL statement to update status
        $stmt = $conn->prepare("UPDATE delivery SET status = :status WHERE delivery_id = :delivery_id");
        // Bind parameters
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':delivery_id', $deliveryId);
        // Execute the statement
        $stmt->execute();

        // Send success response
        echo 'Status updated successfully!';
    } catch (PDOException $e) {
        // Handle database errors
        echo 'Error: ' . $e->getMessage();
    }
} else {
    // Redirect if accessed directly without POST request
    header("Location: delivery.php");
}
?>

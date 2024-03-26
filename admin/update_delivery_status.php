<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deliveryId'], $_POST['status'])) {
    try {
        $deliveryId = $_POST['deliveryId'];
        $status = $_POST['status'];

        // Update the status in the database
        $stmt = $conn->prepare("UPDATE delivery SET status = :status WHERE delivery_id = :delivery_id");
        $stmt->bindParam(':status', $status, PDO::PARAM_BOOL);
        $stmt->bindParam(':delivery_id', $deliveryId);
        $stmt->execute();

        // Return success message
        echo json_encode(["status" => "success", "message" => "Status updated successfully"]);
    } catch (PDOException $e) {
        // Return error message
        echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
    }
} else {
    // Return invalid request message
    echo json_encode(["status" => "error", "message" => "Invalid request method or missing parameters."]);
}
?>

<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $driver_id = $_POST['driver_id'];
    $delivery_date = $_POST['delivery_date'];
    $status = isset($_POST['status']) ? 1 : 0; // Check if status checkbox is checked

    try {
        // Prepare SQL statement to insert delivery information
        $stmt = $conn->prepare("INSERT INTO delivery (driver_id, delivery_date, status) VALUES (:driver_id, :delivery_date, :status)");
        // Bind parameters
        $stmt->bindParam(':driver_id', $driver_id);
        $stmt->bindParam(':delivery_date', $delivery_date);
        $stmt->bindParam(':status', $status);
        // Execute the statement
        $stmt->execute();

        // Redirect or send success response
        // For demonstration purposes, you can simply echo a success message
        echo 'Delivery added successfully!';
    } catch (PDOException $e) {
        // Handle database errors
        echo 'Error: ' . $e->getMessage();
    }
} else {
    // Redirect if accessed directly without form submission
    header("Location: delivery.php");
}
?>

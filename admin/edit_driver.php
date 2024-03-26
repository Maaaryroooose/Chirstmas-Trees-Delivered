<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get form data
        $driverId = $_POST['editDriverId'];
        $driverName = $_POST['editDriverName'];
        $driverPhone = $_POST['editDriverPhone'];

        // Check if a new photo is uploaded
        if ($_FILES['editDriverPhoto']['name'] != "") {
            // File upload
            $targetDir = '../images/';
            $targetFile = $targetDir . basename($_FILES['editDriverPhoto']['name']);
            move_uploaded_file($_FILES['editDriverPhoto']['tmp_name'], $targetFile);

            // Update with new photo
            $stmt = $conn->prepare("UPDATE driver SET driver_name = :name, driver_photo = :photo, driver_phone = :phone WHERE driver_id = :id");
            $stmt->bindParam(':photo', $_FILES['editDriverPhoto']['name']);
        } else {
            // Update without changing photo
            $stmt = $conn->prepare("UPDATE driver SET driver_name = :name, driver_phone = :phone WHERE driver_id = :id");
        }

        // Common parameters
        $stmt->bindParam(':id', $driverId);
        $stmt->bindParam(':name', $driverName);
        $stmt->bindParam(':phone', $driverPhone);

        // Execute the update
        $stmt->execute();

        // Redirect to driver.php after successful update
        header('Location: driver.php');
        exit();

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    // Handle other cases or redirect to an error page
    echo 'Invalid request method.';
}
?>

<?php
include 'includes/session.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get form data
        $driverName = $_POST['addDriverName'];
        $driverPhone = $_POST['addDriverPhone'];

        // File upload
        $targetDir = '../images/'; // Adjust the path accordingly
        $targetFile = $targetDir . basename($_FILES['addDriverPhoto']['name']);
        move_uploaded_file($_FILES['addDriverPhoto']['tmp_name'], $targetFile);

        // Insert into the database
        $stmt = $conn->prepare("INSERT INTO driver (driver_name, driver_phone, driver_photo) VALUES (:name, :phone, :photo)");
        $stmt->bindParam(':name', $driverName);
        $stmt->bindParam(':phone', $driverPhone);
        $stmt->bindParam(':photo', $_FILES['addDriverPhoto']['name']);
        $stmt->execute();

        // Redirect to the main page after successful addition
        header("Location: driver.php");
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    // Handle other cases or redirect to an error page
    echo 'Invalid request method.';
}
?>

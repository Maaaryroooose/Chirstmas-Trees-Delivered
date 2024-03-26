<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get form data
        $supplierName = $_POST['supplierName'];
        $supplierLocation = $_POST['supplierLocation'];
        $supplierPhone = $_POST['supplierPhone'];

        // File upload
        $targetDir = '../images/'; // Adjust the path accordingly
        $targetFile = $targetDir . basename($_FILES['supplierPhoto']['name']);
        move_uploaded_file($_FILES['supplierPhoto']['tmp_name'], $targetFile);

        // Insert into the database
        $stmt = $conn->prepare("INSERT INTO supplier (supplier_name, supplier_photo, supplier_location, supplier_phone) VALUES (:name, :photo, :location, :phone)");
        $stmt->bindParam(':name', $supplierName);
        $stmt->bindParam(':photo', $_FILES['supplierPhoto']['name']);
        $stmt->bindParam(':location', $supplierLocation);
        $stmt->bindParam(':phone', $supplierPhone);
        $stmt->execute();

        // Return success message
        echo 'Supplier added successfully!';
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    // Handle other cases or redirect to an error page
    echo 'Invalid request method.';
}
?>

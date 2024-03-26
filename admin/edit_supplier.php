<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $editSupplierId = $_POST['editSupplierId'];
        $editSupplierName = $_POST['editSupplierName'];
        $editSupplierLocation = $_POST['editSupplierLocation'];
        $editSupplierPhone = $_POST['editSupplierPhone'];

        // File upload for the edited photo (if provided)
        if (!empty($_FILES['editSupplierPhoto']['name'])) {
            $targetDir = '../images/';
            $targetFile = $targetDir . basename($_FILES['editSupplierPhoto']['name']);
            move_uploaded_file($_FILES['editSupplierPhoto']['tmp_name'], $targetFile);

            // Update with the new photo
            $stmt = $conn->prepare("UPDATE supplier SET supplier_name = :name, supplier_photo = :photo, supplier_location = :location, supplier_phone = :phone WHERE supplier_id = :id");
            $stmt->bindParam(':photo', $_FILES['editSupplierPhoto']['name']);
        } else {
            // Update without changing the photo
            $stmt = $conn->prepare("UPDATE supplier SET supplier_name = :name, supplier_location = :location, supplier_phone = :phone WHERE supplier_id = :id");
        }

        $stmt->bindParam(':id', $editSupplierId);
        $stmt->bindParam(':name', $editSupplierName);
        $stmt->bindParam(':location', $editSupplierLocation);
        $stmt->bindParam(':phone', $editSupplierPhone);
        $stmt->execute();

        echo 'Supplier updated successfully!';
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Invalid request method.';
}
?>

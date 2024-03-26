<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $supplierId = $_POST['supplierId'];

        $stmt = $conn->prepare("SELECT supplier_id, supplier_name, supplier_photo, supplier_location, supplier_phone FROM supplier WHERE supplier_id = :id");
        $stmt->bindParam(':id', $supplierId);
        $stmt->execute();

        $supplierData = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($supplierData);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Invalid request method.';
}
?>

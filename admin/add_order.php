<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["orderEmail"];
    $firstName = $_POST["orderFirstName"];
    $lastName = $_POST["orderLastName"];
    $city = $_POST["orderCity"];
    $address = $_POST["orderAddress"];
    $phone = $_POST["orderPhone"];

    $conn = $pdo->open();

    try {
        $stmt = $conn->prepare("INSERT INTO users (email, firstname, lastname, city, address, contact_info, type) VALUES (:email, :firstname, :lastname, :city, :address, :phone, 0)");
        $stmt->execute(['email' => $email, 'firstname' => $firstName, 'lastname' => $lastName, 'city' => $city, 'address' => $address, 'phone' => $phone]);

        $_SESSION['success'] = 'Order added successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Error adding order: ' . $e->getMessage();
    }

    $pdo->close();
}

header('Location: orders.php'); // Redirect to your main page
exit();
?>

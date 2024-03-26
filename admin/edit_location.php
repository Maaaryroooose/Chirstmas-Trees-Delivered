<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the edited location data from the form
    $editLocationId = $_POST['editLocationId'];
    $editLocationName = $_POST['editLocationName'];

    // Update the location in the database
    try {
        $stmt = $conn->prepare("UPDATE location SET location_name = :locationName WHERE location_id = :locationId");
        $stmt->bindParam(':locationName', $editLocationName);
        $stmt->bindParam(':locationId', $editLocationId);
        $stmt->execute();

        // Redirect back to the main page after editing the location
        header("Location: location.php");
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

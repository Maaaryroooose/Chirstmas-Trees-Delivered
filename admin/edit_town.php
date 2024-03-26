<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the edited town data from the form
    $editTownId = $_POST['editTownId'];
    $editTownName = $_POST['editTownName'];
    $editZoneId = $_POST['editZoneId'];

    // Update the town in the database
    try {
        $stmt = $conn->prepare("UPDATE town SET town_name = :townName, zone_id = :zoneId WHERE town_id = :townId");
        $stmt->bindParam(':townName', $editTownName);
        $stmt->bindParam(':zoneId', $editZoneId);
        $stmt->bindParam(':townId', $editTownId);
        $stmt->execute();

        // Redirect back to the main page after editing the town
        header("Location: town.php");
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

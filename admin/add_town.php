<?php

include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the data from the form
    $newTownName = $_POST['newTownName'];
    $newZoneId = $_POST['newZoneId'];

    try {
        // Prepare the SQL statement to insert the new town into the database
        $stmt = $conn->prepare("INSERT INTO town (town_name, zone_id) VALUES (:town_name, :zone_id)");

        // Bind parameters
        $stmt->bindParam(':town_name', $newTownName);
        $stmt->bindParam(':zone_id', $newZoneId);

        // Execute the statement
        $stmt->execute();

        // Redirect to the town page after successful insertion
        header("Location: town.php");
        exit();
    } catch (PDOException $e) {
        // Handle errors if necessary
        echo "Error: " . $e->getMessage();
    }
}

// Close the database connection
$conn = null;
?>

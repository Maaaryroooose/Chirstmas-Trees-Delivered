<?php

include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the data from the form
    $newLocationName = $_POST['newLocationName'];

    try {
        // Prepare the SQL statement to insert the new location into the database
        $stmt = $conn->prepare("INSERT INTO location (location_name) VALUES (:location_name)");

        // Bind parameters
        $stmt->bindParam(':location_name', $newLocationName);

        // Execute the statement
        $stmt->execute();

        // Redirect to the location page after successful insertion
        header("Location: location.php");
        exit();
    } catch (PDOException $e) {
        // Handle errors if necessary
        echo "Error: " . $e->getMessage();
    }
}

// Close the database connection
$conn = null;
?>

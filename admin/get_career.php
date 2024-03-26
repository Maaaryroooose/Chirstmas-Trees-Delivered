<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the career ID is provided via POST
    if (isset($_POST['careerId'])) {
        $careerId = $_POST['careerId'];

        try {
            // Prepare SQL statement to select career information based on career ID
            $stmt = $conn->prepare("SELECT * FROM career WHERE career_id = :id");
            $stmt->bindParam(':id', $careerId);
            $stmt->execute();

            // Fetch the career information
            $career = $stmt->fetch(PDO::FETCH_ASSOC);

            // Return career information as JSON response
            echo json_encode($career);
        } catch (PDOException $e) {
            echo json_encode(array("error" => $e->getMessage()));
        }
    } else {
        // Return error message if career ID is not provided
        echo json_encode(array("error" => "Career ID not provided."));
    }
}
?>

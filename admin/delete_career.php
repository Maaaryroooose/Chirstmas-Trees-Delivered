<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the career ID is provided via POST
    if (isset($_POST['careerId'])) {
        $careerId = $_POST['careerId'];

        try {
            // Prepare SQL statement to delete the career
            $stmt = $conn->prepare("DELETE FROM career WHERE career_id = :id");
            $stmt->bindParam(':id', $careerId);
            $stmt->execute();

            // Return success message
            echo "Career deleted successfully.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Return error message if career ID is not provided
        echo "Career ID not provided.";
    }
}
?>

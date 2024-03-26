<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $careerId = $_POST['editCareerId'];
    $careerTitle = $_POST['editCareerTitle'];
    $careerDescription = $_POST['editCareerDescription'];

    try {
        // Prepare SQL statement to update career information
        $stmt = $conn->prepare("UPDATE career SET career_title = :title, career_description = :description WHERE career_id = :id");
        $stmt->bindParam(':title', $careerTitle);
        $stmt->bindParam(':description', $careerDescription);
        $stmt->bindParam(':id', $careerId);
        $stmt->execute();

        // Redirect back to the career page
        header("Location: career.php");
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

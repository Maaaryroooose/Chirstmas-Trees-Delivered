<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $careerTitle = $_POST['addCareerTitle'];
    $careerDescription = $_POST['addCareerDescription'];
    $careerSalary = $_POST['addCareerSalary'];
    $careerType = $_POST['addCareerJob'];
    $careerExperience = $_POST['addCareerExperience'];
    $careerLocation = $_POST['addCareerLocation'];
    try {
        // Prepare SQL statement to insert career information
        $stmt = $conn->prepare("INSERT INTO career (career_title, career_description, salary, type, experience,location) VALUES (:title, :salary, :type, :experience, :location, :description, :)");
        $stmt->bindParam(':title', $careerTitle);
        $stmt->bindParam(':salary', $careerDescription);
        $stmt->bindParam(':type', $careerType);
        $stmt->bindParam(':experience', $careerExperience);
        $stmt->bindParam(':location', $careerLocation);
        $stmt->bindParam(':description', $careerDescription);
        
        $stmt->execute();
        
        // Redirect back to the career page
        header("Location: career.php");
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

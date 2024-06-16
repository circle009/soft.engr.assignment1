<?php
session_start();

// Database connection details
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fitness_app';

try {
    // Establish PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the Cancel button was clicked
    if (isset($_POST['cancel'])) {
        header("Location: dashboard.php");
        exit();
    }

    // Prepare SQL update query
    $stmt = $conn->prepare("UPDATE user SET password = :password, fullname = :fullname, gender = :gender, height = :height, weight = :weight WHERE username = :username");

    // Bind parameters
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->bindParam(':fullname', $_POST['fullname']);
    $stmt->bindParam(':gender', $_POST['gender']);
    $stmt->bindParam(':height', $_POST['height']);
    $stmt->bindParam(':weight', $_POST['weight']);
    $stmt->bindParam(':username', $_POST['username']);

    // Execute the update query
    $stmt->execute();

    // Redirect to dashboard page after successful update
    header("Location: ../dashboard.php");
    exit();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    die("Connection failed: " . $error_message);
}
?>

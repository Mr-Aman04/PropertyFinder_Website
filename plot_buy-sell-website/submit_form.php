<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mohan_assosiates";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO reviews (name, email, review) VALUES (?, ?, ?)");
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Set parameters and execute
$name = htmlspecialchars($_POST['name']); // Use htmlspecialchars to prevent XSS attacks
$email = htmlspecialchars($_POST['email']); // Use htmlspecialchars to prevent XSS
$review = htmlspecialchars($_POST['review']); // Use htmlspecialchars to prevent XSS

$stmt->bind_param("sss", $name, $email, $review);

if ($stmt->execute()) {
    // Redirect to index.html after successful submission
    echo "<script> window.location.href = 'index.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<?php
$servername = "localhost";
$username = "root"; // use your DB username
$password = ""; // use your DB password if any
$dbname = "user_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['name'];
$age = $_POST['age'];
$userid = $_POST['userid'];
$email = $_POST['email'];
$course = $_POST['course'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (name, age, userid, email, course) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $name, $age, $userid, $email, $course);

if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
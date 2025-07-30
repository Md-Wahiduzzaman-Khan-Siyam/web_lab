<?php
$servername = "localhost";
$username = "root"; // use your DB username
$password = ""; // use your DB password if any
$dbname = "prac2_user_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['name'];
$email = $_POST['email'];
$userid = $_POST['userid'];
$dept = $_POST['dept'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (name, email, userid, dept) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $userid, $dept);

if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
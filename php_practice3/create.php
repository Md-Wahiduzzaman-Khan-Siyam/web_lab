<?php include 'db.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $address = $_POST['address'];

    $conn->query("INSERT INTO employees (name, gender, email, department, address) 
                  VALUES ('$name', '$gender', '$email', '$department', '$address')");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add Employee</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <select name="gender">
            <option>Male</option>
            <option>Female</option>
        </select>
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="department" placeholder="Department">
        <textarea name="address" placeholder="Address"></textarea>
        <button type="submit" class="btn">Save</button>
    </form>
</div>
</body>
</html>

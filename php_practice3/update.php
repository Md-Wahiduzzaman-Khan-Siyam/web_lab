<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM employees WHERE emp_id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $address = $_POST['address'];

    $conn->query("UPDATE employees SET 
        name='$name', gender='$gender', email='$email', 
        department='$department', address='$address' 
        WHERE emp_id=$id");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Employee</h2>
    <form method="POST">
        <input type="text" name="name" value="<?= $row['name'] ?>" required>
        <select name="gender">
            <option <?= $row['gender']=="Male"?"selected":"" ?>>Male</option>
            <option <?= $row['gender']=="Female"?"selected":"" ?>>Female</option>
        </select>
        <input type="email" name="email" value="<?= $row['email'] ?>">
        <input type="text" name="department" value="<?= $row['department'] ?>">
        <textarea name="address"><?= $row['address'] ?></textarea>
        <button type="submit" class="btn">Update</button>
    </form>
</div>
</body>
</html>

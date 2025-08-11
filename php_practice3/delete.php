<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$conn->query("DELETE FROM employees WHERE emp_id=$id");
header("Location: index.php");
exit;
?>

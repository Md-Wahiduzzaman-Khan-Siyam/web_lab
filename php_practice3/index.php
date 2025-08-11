<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee CRUD System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Employee List</h2>
    <a href="create.php" class="btn">Add Employee</a><br><br>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Gender</th><th>Email</th>
            <th>Department</th><th>Address</th><th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM employees");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['emp_id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['address']}</td>
                    <td>
                        <a href='update.php?id={$row['emp_id']}' class='btn-edit'>Edit</a>
                        <a href='delete.php?id={$row['emp_id']}' class='btn-delete' onclick='return confirm(\"Delete?\")'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>

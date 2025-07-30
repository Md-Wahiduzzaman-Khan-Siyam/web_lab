<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>User Data Form</h2>
    <form action="insert.php" method="POST">
        <input type="text" name="name" placeholder="Name" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="text" name="userid" placeholder="User ID" required><br><br>
        <input type="text" name="dept" placeholder="Department" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Search User</h2>
    <form method="POST" action="search.php">
        <input type="text" name="userid" placeholder="Search by User ID"><br><br>
        <input type="text" name="name" placeholder="Search by Name"><br><br>
        <input type="text" name="dept" placeholder="Search by Department"><br><br>
        <input type="submit" value="Search">
    </form>

</body>
</html>

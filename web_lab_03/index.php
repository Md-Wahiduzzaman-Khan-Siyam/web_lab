<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
</head>
<body>
    <h2>User Data Form</h2>
    <form action="insert.php" method="POST">
        <input type="text" name="name" placeholder="Name"><br><br>
        <input type="number" name="age" placeholder="Age"><br><br>
        <input type="text" name="userid" placeholder="User Id"><br><br>
        <input type="email" name="email" placeholder="Email"><br><br>
        <label for="course">Registered Course:</label><br>
        <select name="course" required>
            <option value=""> Select Course </option>
            <option value="Math">Math</option>
            <option value="Bangla">Bangla</option>
            <option value="English">English</option>
        </select><br><br>
        <input type="submit" value="Submit">

    </form>
</body>
</html>

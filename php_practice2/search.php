<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
    // Database connection
    $conn = new mysqli("localhost", "root", "", "prac2_user_data");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get search input
    $userid = $_POST['userid'] ?? '';
    $name = $_POST['name'] ?? '';
    $dept = $_POST['dept'] ?? '';

    // Build SQL query
    $query = "SELECT name, email, userid, dept FROM users WHERE 1=1";
    $params = [];
    $types = "";

    if (!empty($userid)) {
        $query .= " AND userid = ?";
        $params[] = $userid;
        $types .= "s";
    }
    if (!empty($name)) {
        $query .= " AND name LIKE ?";
        $params[] = "%" . $name . "%";
        $types .= "s";
    }
    if (!empty($dept)) {
        $query .= " AND dept LIKE ?";
        $params[] = "%" . $dept . "%";
        $types .= "s";
    }

    $stmt = $conn->prepare($query);

    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h2>Search Results:</h2>";

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Name</th><th>Email</th><th>User ID</th><th>Department</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["userid"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["dept"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No matching users found.";
    }

    $stmt->close();
    $conn->close();
    ?>

</body>
</html>
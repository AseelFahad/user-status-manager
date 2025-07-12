<?php
$conn = new mysqli("localhost", "root", "", "user_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $sql = "INSERT INTO users (name, age) VALUES ('$name', '$age')";
    $conn->query($sql);
}

if (isset($_GET['toggle'])) {
    $id = $_GET['toggle'];
    $result = $conn->query("SELECT status FROM users WHERE id=$id");
    $row = $result->fetch_assoc();
    $newStatus = $row['status'] == 1 ? 0 : 1;
    $conn->query("UPDATE users SET status=$newStatus WHERE id=$id");
    header("Location: index.php");
    exit;
}

$users = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
        }

        h2 {
            color: #333;
        }

        form {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 20px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        a.toggle-btn {
            padding: 6px 12px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        a.toggle-btn:hover {
            background: #1e7e34;
        }
    </style>
</head>
<body>

    <h2>User Form</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>User Table</h2>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th>
        </tr>
        <?php while($row = $users->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= htmlspecialchars($row["name"]) ?></td>
            <td><?= $row["age"] ?></td>
            <td><?= $row["status"] ?></td>
            <td><a class="toggle-btn" href="?toggle=<?= $row["id"] ?>">Toggle</a></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>

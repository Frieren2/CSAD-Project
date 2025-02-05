<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "db_movie");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM moviedetails";
$result = mysqli_query($db, $sql);

//check if role is 'user'
$role = $_SESSION['role'] ?? 'user';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Movies</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Movie List</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Genres</th>
                <th>Description</th>
                <th>Rating</th>
                <th>Cinema</th>
                <th>Screen</th>

            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['genres']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['rating']; ?></td>
                    <td><?php echo $row['cinema']; ?></td>
                    <td><?php echo $row['screen']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No movies found.</p>
    <?php endif; ?>

    <br>
    <?php if ($role === 'admin'): ?>
        <a href="addmovie.php">Add a New Movie</a>
    <?php endif; ?>
</body>
</html>

<?php

mysqli_close($db);
?>

<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "db_movie");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM bookings";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
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

    <h2>Booking List</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>Email</th>
                <th>Show</th>
                <th>Cinema</th>
                <th>Screen</th>
                <th>Showtime</th>
                <th>Seat Number</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['showname']; ?></td>
                    <td><?php echo $row['cinema']; ?></td>
                    <td><?php echo $row['screen']; ?></td>
                    <td><?php echo $row['showtime']; ?></td>
                    <td><?php echo $row['seat']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No bookings found</p>
    <?php endif; ?>

    <br>
    <a href="addbooking.php">Add a New Booking</a>

</body>
</html>

<?php

mysqli_close($db);
?>
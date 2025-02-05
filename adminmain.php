<?php
session_start();

// Ensure only admins can access this page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Access denied! Only admins can access this page.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        h2 {
            margin-bottom: 20px;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        .admin-button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            width: 200px;
        }
        .admin-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h2>Admin Dashboard</h2>

    <div class="button-container">
        <a href="viewmovies.php" class="admin-button">View Movies</a>
        <a href="addmovie.php" class="admin-button">Add Movie</a>
        <a href="viewbookings.php" class="admin-button">View Bookings</a>
        <a href="addbooking.php" class="admin-button">Add Booking</a>
        <a href="login.php" class="admin-button" style="background-color: red;">Logout</a>
    </div>

</body>
</html>

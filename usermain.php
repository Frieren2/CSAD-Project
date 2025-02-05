<?php
session_start();

// Ensure only logged-in users can access this page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get the logged-in user's role
$role = $_SESSION['role'] ?? 'user';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
        .user-button {
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
        .user-button:hover {
            background-color: #0056b3;
        }
        .logout-button {
            background-color: red;
        }
    </style>
</head>
<body>

    <h2>Welcome to Your Dashboard</h2>

    <div class="button-container">
        <a href="viewbookings.php" class="user-button">View Bookings</a>
        <a href="addbooking.php" class="user-button">Add Booking</a>
        <a href="viewmovies.php" class="user-button">View Movies</a>
        <a href="logout.php" class="user-button logout-button">Logout</a>
    </div>

</body>
</html>

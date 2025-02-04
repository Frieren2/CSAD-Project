<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['selected_seats'] = isset($_POST['selectedSeats']) ? explode(",", $_POST['selectedSeats']) : [];
    $_SESSION['movieId'] = $_POST['movieId'] ?? '';
    $_SESSION['location'] = $_POST['location'] ?? '';
    $_SESSION['time'] = $_POST['time'] ?? '';
    $_SESSION['screen'] = $_POST['screen'] ?? '';

    //redirect to the payment page
    header("Location: index.php?page=payment");
    exit();
}
?>

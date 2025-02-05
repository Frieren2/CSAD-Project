<?php 
session_start();
$selectedSeats = isset($_SESSION['selected_seats']) ? $_SESSION['selected_seats'] : [];
$movieId = isset($_SESSION['movieId']) ? $_SESSION['movieId'] : '';
$location = isset($_SESSION['location']) ? $_SESSION['location'] : '';
$time = isset($_SESSION['time']) ? $_SESSION['time'] : '';

//sql for add to DB

?>
        <h1>Payment Successful!</h1>
        <p>Thank you for your purchase.</p>
        <p>Your booking has been confirmed.</p>
        
        <!-- View Bookings Button -->
        <a href="index.php?page=tickets" class="btn">View Bookings</a>

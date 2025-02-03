<?php
// Retrieve and sanitize parameters from the URL
$movieId = isset($_GET['movieId']) ? (int) $_GET['movieId'] : 0;
$location = isset($_GET['location']) ? trim($_GET['location']) : '';
$time = isset($_GET['time']) ? trim($_GET['time']) : '';

// Validate the movie ID
if ($movieId <= 0) {
    die("Invalid movie ID.");
}

// Validate that location and time are provided
if (empty($location) || empty($time)) {
    die("Invalid location or time.");
}

?>
<h1>Movie Seat Selection</h1>
<div class="select-seat-container">
    <div class="screen">SCREEN</div>
    <div class="seat-container" id="seats"></div>
</div>
<h1>Summary</h1>
<div class="summary">
        <img src="resources/movie-poster1.png" alt="Movie Poster">
        <div class="summary-text">
            <p><strong>Movie:</strong> <span id="movieTitle">Avengers: Endgame</span></p>
            <p><strong>Location:</strong> <span id="movieLocation">Downtown Cinema</span></p>
            <p><strong>Screen:</strong> <span id="screenNumber">5</span></p>
            <p><strong>Date:</strong> <span id="movieDate">2025-02-15 <?=$time?></span></p>
            <p><strong>Selected Seats:</strong> <span id="selectedSeats">None</span></p>
            <p><strong>Total Price:</strong> $<span id="totalPrice">0</span></p>
        </div>
        <button onclick="proceedNext()">Next ></button>
    </div>
    
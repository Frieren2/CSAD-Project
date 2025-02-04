<?php
// Retrieve and sanitize parameters from the URL
$movieId = isset($_GET['movieId']) ? (int) $_GET['movieId'] : 0;
$location = isset($_GET['location']) ? trim($_GET['location']) : '';
$time = isset($_GET['time']) ? trim($_GET['time']) : '';
$screen = 6; //get screen available for this movie from movieId

// Validate the movie ID
if ($movieId <= 0) {
    die("Invalid movie ID.");
}

// Validate that location and time are provided
if (empty($location) || empty($time)) {
    die("Invalid location or time.");
}

?>
<button id="back-button">&#x25c0 Back</button>
<h1>Movie Seat Selection</h1>
<div class="select-seat-container">
    <div class="screen">SCREEN</div>
    <div class="seat-container" id="seats"></div>
</div>
<h1>Summary</h1>
<div class="summary">
    <img src="resources/movie-poster1.png" alt="Movie Poster">
    <div class="summary-text">
        <p><strong>Movie:</strong> <span id="movieTitle">Avengers: Endgame <?= $movieId ?></span></p>
        <p><strong>Location:</strong> <span id="movieLocation"><?= $location ?></span></p>
        <p><strong>Screen:</strong> <span id="screenNumber"><?= $screen ?></span></p>
        <p><strong>Date:</strong> <span id="movieDate"><?= $time ?></span></p>
        <p><strong>Selected Seats:</strong> <span id="selectedSeats">None</span></p>
        <p><strong>Total Price:</strong> $<span id="totalPrice">0</span></p>
    </div>
    <form id="seatForm" action="save-selection.php" method="POST">
        <input type="hidden" name="selectedSeats" id="selectedSeatsInput">
        <input type="hidden" name="movieId" value="<?= $movieId ?>">
        <input type="hidden" name="location" value="<?= $location ?>">
        <input type="hidden" name="time" value="<?= $time ?>">
        <input type="hidden" name="screen" value="<?= $screen ?>">
        <button type="button" onclick="submitSeats()">Proceed to payment</button>
    </form>
</div>
<?php
// Get the movie ID from the URL
$movieId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Validate the movie ID
if ($movieId <= 0) {
    die("Invalid movie ID.");
}
?>
<div class="container">
    <div class="movie-banner" style="background-image:url('resources/movie-banner.png')"></div>
    <div class="movie-details-top">
        <div class="movie-poster">
            <img src="resources/movie-poster1.png" alt="Movie Poster">
        </div>
        <div class="movie-info">
            <h1>Movie Title</h1>
            <p><strong>Age Rating:</strong> PG-13</p>
            <p><strong>Release Date:</strong> 2023-01-01</p>
            <p><strong>Genre:</strong> Action, Adventure</p>
            <p><strong>Synopsis:</strong> Lorem ipsum dolor sit amet...</p>
        </div>
    </div>

    <div class="locations-timings">
        <h2>Available Locations and Timings</h2>
        <p>Details to be added...</p>
    </div>
</div>
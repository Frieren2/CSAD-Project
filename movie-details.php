<?php
// Get the movie ID from the URL
$movieId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Validate the movie ID
if ($movieId <= 0) {
    die("Invalid movie ID.");
}
?>
<div class="container mt-5">
        <!-- Top Section -->
        <div class="movie-details-top">
            <!-- Movie Poster -->
            <div class="movie-poster">
                <!-- Placeholder for the movie poster -->
                <img src="resources/movie-poster.png" alt="Movie Poster">
            </div>

            <!-- Movie Info -->
            <div class="movie-info">
                <h1>Movie ID: <?php echo htmlspecialchars($movieId); ?></h1>
                <p><strong>Age Rating:</strong> Placeholder Rating</p>
                <p><strong>Release Date:</strong> Placeholder Date</p>
                <p><strong>Genre:</strong> Placeholder Genre</p>
                <p><strong>Synopsis:</strong> Placeholder Synopsis for movie ID <?php echo htmlspecialchars($movieId); ?>.</p>
            </div>
        </div>

        <!-- Locations and Timings -->
        <div class="locations-timings">
            <h2>Available Locations and Timings</h2>
            <p>Details to be added later.</p>
        </div>
    </div>
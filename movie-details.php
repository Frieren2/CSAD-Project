<?php
// Get the movie ID from the URL
$movieId = isset($_GET['movieId']) ? (int) $_GET['movieId'] : 0;

// Validate the movie ID
if ($movieId <= 0) {
    die("Invalid movie ID.");
}
?>
<div class="container">
<button id="back-button">&#x25c0</button>
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
            <p><strong>Synopsis:</strong>"Lorem ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerci esse cill ipsum ,
             quis nostrud exerci esse cill ipsum , quis nostrud exer ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerc
             i esse cill ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerci esse cill
              ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerci esse cill ipsum , 
              quis nostrud exerci esse cill ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerci esse cill ipsum , quis nost
              ud exerci esse cill ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerci e
              sse cill ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerci esse cillci esse cill ipsum , quis nostrud exerci esse
               cill ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerci esse cill ipsum , quis nostrud exerci esse cillum dolort la
               borum."
            </p>
        </div>
    </div>

    <div class="locations-timings">
        <h2>Available Locations and Timings</h2>
        <div class="date-selector-container">
            <label for="date-selector">Choose a Date:</label>
            <input type="date" id="date-selector" onchange="handleDateChange(this.value)">
        </div>
        <!-- The container for dynamically loaded locations & timings -->
        <div id="locations-container"></div>
    </div>
</div>
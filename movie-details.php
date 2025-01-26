<?php
// Get the movie ID from the URL
$movieId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

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
        <div class="location">
            <h3>Cathay Cineplex (Downtown)</h3>
            <ul>
                <li><button class="timing-btn">10:00 AM</button></li>
                <li><button class="timing-btn">1:00 PM</button></li>
                <li><button class="timing-btn">4:00 PM</button></li>
                <li><button class="timing-btn">7:00 PM</button></li>
            </ul>
        </div>
        <div class="location">
            <h3>Golden Village (City Square)</h3>
            <ul>
                <li><button class="timing-btn">11:00 AM</button></li>
                <li><button class="timing-btn">2:00 PM</button></li>
                <li><button class="timing-btn">5:00 PM</button></li>
            </ul>
        </div>
    </div>
</div>
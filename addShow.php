<?php
// Database connection
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "csad";

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name FROM movies";
$results = $conn->query($sql);
?>


<div class="headers" id ="container">
    <form class="form-section" method="post" action="shows.php" onsubmit="return validateForm()">
        <h1>Add Show:</h1>
        <h4>Select Movie:</h4>
        <select class="select" id="movieSelect" name="movie">
            <option value="">Select a movie</option>
            <?php while ($row = $results->fetch_assoc()) { ?>
                <option value="<?php echo $row['name']; ?>">
                    <?php echo htmlspecialchars($row['name']); ?>
                </option>
            <?php } ?>
        </select>

        <h4>Select Cinema:</h4>
        <select class="select" name="cinema" id="cinemaSelect">
            <option value = "">Select a cinema</option>
            <option value="Cathay Cineplexes (West Mall)">Cathay Cineplexes (West Mall)</option>
            <option value="Cathay Cineplexes (Jem)">Cathay Cineplexes (Jem)</option>
            <option value="Cathay Cineplexes (Causeway Point)">Cathay Cineplexes (Causeway Point)</option>
            <option value="Golden Village (Plaza)">Golden Village (Plaza)</option>
            <option value="Golden Village (Jurong Point)">Golden Village (Jurong Point)</option>
        </select>

        <h4>Select Date:</h4>
        <input type="date" id="date-selector" style="margin-left:10px">
        <h4>Select Screen:</h4>
        <select class="select" name="screen" id="screenselect">
            <option value="">Select a screen</option>
            <option value="Screen A">Screen A</option>
            <option value="Screen B">Screen B</option>
            <option value="Screen C">Screen C </option>
            <option value="Screen D">Screen D</option>
            <option value="Screen E">Screen E</option>
        </select>
        <h4>Select Showtimes:</h4>
        <select class="select" name="showtime" id="timeselect">
            <option value="">Select a timing</option>
            <option value="11:00 - 13:00">11:00 - 13:00</option>
            <option value="13:30 - 15:30">13:30 - 15:30</option>
            <option value="16:00 - 17:00">16:00 - 17:00</option>
            <option value="17:30 - 19:30">17:30 - 19:30</option>
            <option value="20:00 - 22:00">20:00 - 22:00</option>
        </select>
        <div><button class="button" type="submit" value="add_show" name="add" style="margin-left:10px">Add Show</button></div>
    </form>
    <div class="preview-section">
        <h2>Show Preview:</h2>
        <div class="preview-box">
            <p><span style="font-weight: bold;">Movie: </span><span id="preview-movie">Not selected</span></p>
            <p><span style="font-weight: bold;">Cinema: </span> <span id="preview-cinema">Not selected</span></p>
            <p><span style="font-weight: bold;">Date: </span> <span id="preview-date">Not selected</span></p>
            <p><span style="font-weight: bold;">Screen: </span><span id="preview-screen">Not selected</span></p>
            <p><span style="font-weight: bold;">Showtime: </span> <span id="preview-showtime">Not selected</span></p>
        </div>
    </div>
</div>

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Show</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            gap: 20px;
        }
        .form-section {
            flex: 1;
        }
        .preview-section {
            flex: 1;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .preview-box {
            border: 1px solid #ccc;
            padding: 10px;
            background: white;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Form Section -->
    <div class="form-section">
        <form id="showForm">
            <h1>Add Show:</h1>

            <h4>Select Movie:</h4>
            <select class="select" id="movieSelect" name="movie">
                <option value="">Select a Movie</option>
                <?php while ($row = $results->fetch_assoc()) { ?>
                    <option value="<?php echo htmlspecialchars($row['name']); ?>">
                        <?php echo htmlspecialchars($row['name']); ?>
                    </option>
                <?php } ?>
            </select>

            <h4>Select Cinema:</h4>
            <select class="select" name="cinema" id="cinemaSelect">
                <option value="">Select a Cinema</option>
                <option value="Cathay Cineplexes (West Mall)">Cathay Cineplexes (West Mall)</option>
                <option value="Cathay Cineplexes (Jem)">Cathay Cineplexes (Jem)</option>
                <option value="Cathay Cineplexes (Causeway Point)">Cathay Cineplexes (Causeway Point)</option>
                <option value="Golden Village (Plaza)">Golden Village (Plaza)</option>
                <option value="Golden Village (Jurong Point)">Golden Village (Jurong Point)</option>
            </select>

            <h4>Select Date:</h4>
            <input type="date" id="date-selector" name="date">

            <h4>Select Screen:</h4>
            <select class="select" name="screen" id="screenselect">
                <option value="">Select a screen</option>
                <option value="Screen A">Screen A</option>
                <option value="Screen B">Screen B</option>
                <option value="Screen C">Screen C</option>
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

            <div><button class="button" type="submit">Add Show</button></div>
        </form>
    </div>

    <!-- Preview Section -->
    <div class="preview-section">
        <h2>Show Preview:</h2>
        <div class="preview-box">
            <p><strong>Movie:</strong> <span id="preview-movie">Not selected</span></p>
            <p><strong>Cinema:</strong> <span id="preview-cinema">Not selected</span></p>
            <p><strong>Date:</strong> <span id="preview-date">Not selected</span></p>
            <p><strong>Screen:</strong> <span id="preview-screen">Not selected</span></p>
            <p><strong>Showtime:</strong> <span id="preview-showtime">Not selected</span></p>
        </div>
    </div>
</div>

<script>
// Set default date to today
const today = new Date();
const formattedDate = today.toISOString().split('T')[0];
document.getElementById('date-selector').value = formattedDate;

// Function to update preview
function updatePreview() {
    document.getElementById('preview-movie').innerText = document.getElementById('movieSelect').value || "Not selected";
    document.getElementById('preview-cinema').innerText = document.getElementById('cinemaSelect').value || "Not selected";
    document.getElementById('preview-date').innerText = document.getElementById('date-selector').value || "Not selected";
    document.getElementById('preview-screen').innerText = document.getElementById('screenselect').value || "Not selected";
    document.getElementById('preview-showtime').innerText = document.getElementById('timeselect').value || "Not selected";
}

// Add event listeners to form fields
document.getElementById('movieSelect').addEventListener('change', updatePreview);
document.getElementById('cinemaSelect').addEventListener('change', updatePreview);
document.getElementById('date-selector').addEventListener('input', updatePreview);
document.getElementById('screenselect').addEventListener('change', updatePreview);
document.getElementById('timeselect').addEventListener('change', updatePreview);
</script>

</body>
</html>

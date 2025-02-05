<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$db = mysqli_connect("localhost", "root", "", "db_movie");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
$email = $_SESSION['user_email'];

$movies = [];
$movieQuery = mysqli_query($db, "SELECT id, name, cinema, screen FROM moviedetails");
while ($row = mysqli_fetch_assoc($movieQuery)) {
    $movies[] = $row;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_booking"])) {
    $showname = $_POST['showname'];
    $cinema = $_POST['cinema'];
    $screen = $_POST['screen'];
    $showtime = $_POST['showtime'];
    $seat = $_POST['seat'];

    $showtime_formatted = date("Y-m-d H:i:s", strtotime($showtime));

    $sql = "INSERT INTO bookings (email, showname, cinema, screen, showtime, seat) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssssss", $email, $showname, $cinema, $screen, $showtime_formatted, $seat);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Ticket Booked Successfully";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Movie</title>
    <script>
        function updateCinemaScreen() {
            var movieSelect = document.getElementById("showname");
            var selectedMovie = movieSelect.options[movieSelect.selectedIndex];
            var cinema = selectedMovie.getAttribute("data-cinema");
            var screen = selectedMovie.getAttribute("data-screen");

            document.getElementById("cinema").value = cinema;
            document.getElementById("screen").value = screen;
        }
    </script>
</head>
<body>

<h2>Book a Movie Ticket</h2>

<?php if (isset($_SESSION['message'])): ?>
        <p><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>

    <form action="addbooking.php" method="POST">
        
        <!-- Movie Dropdown -->
        <label>Select Movie:</label>
        <select id="showname" name="showname" onchange="updateCinemaScreen()" required>
            <option value="">-- Select a Movie --</option>
            <?php foreach ($movies as $movie): ?>
                <option value="<?php echo htmlspecialchars($movie['name']); ?>" 
                    data-cinema="<?php echo htmlspecialchars($movie['cinema']); ?>"
                    data-screen="<?php echo htmlspecialchars($movie['screen']); ?>">
                    <?php echo htmlspecialchars($movie['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <!-- Cinema (Auto-filled) -->
        <label>Cinema:</label>
        <input type="text" id="cinema" name="cinema" readonly>
        <br><br>

        <!-- Screen (Auto-filled) -->
        <label>Screen:</label>
        <input type="text" id="screen" name="screen" readonly>
        <br><br>

        <label>Select Showtime:</label><br>
        <input type="radio" name="showtime" value="10:00 AM" required> 10:00 AM
        <input type="radio" name="showtime" value="1:00 PM"> 1:00 PM
        <input type="radio" name="showtime" value="4:00 PM"> 4:00 PM
        <input type="radio" name="showtime" value="7:00 PM"> 7:00 PM
        <input type="radio" name="showtime" value="10:00 PM"> 10:00 PM
        <br><br>

        <label>Enter Seat Number:</label>
        <input type="text" name="seat" placeholder="e.g., A12" required>
        <br><br>

        <button type="submit" name="add_booking">Book Ticket</button>
    </form>

    <br>
    <a href="viewbookings.php"><button>View Booking</button></a>

</body>
</html>
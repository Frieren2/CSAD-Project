<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Access denied! Only admins can add movies.");
}

$db = mysqli_connect("localhost", "root", "", "db_movie");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_movie"])) {
    $name = $_POST['name'];
    $genres = $_POST['genres'];
    $description = $_POST['description'];
    $rating = $_POST['rating']; 
    $cinema = $_POST['cinema']; 
    $screen = $_POST['screen']; 

    $sql = "INSERT INTO moviedetails (name, genres, description, rating, cinema, screen) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssssss", $name, $genres, $description, $rating, $cinema, $screen);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Movie added successfully!";
        header("Location: viewmovies.php");
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
    <title>Add Movie</title>
</head>
<body>

    <h2>Add a New Movie</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <p style="color: green;"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>

    <form action="addmovie.php" method="POST">
        <label>Movie Name:</label>
        <input type="text" name="name" required>
        <br><br>

        <label>Genres (Comma-separated):</label>
        <input type="text" name="genres" placeholder="e.g., Action, Drama, Sci-Fi" required>
        <br><br>

        <label>Description:</label>
        <textarea name="description" rows="4" required></textarea>
        <br><br>

        <label>Rating:</label>
            <input type="radio" name="rating" value="PG" required> PG
            <input type="radio" name="rating" value="PG13"> PG13
            <input type="radio" name="rating" value="NC16"> NC16
            <input type="radio" name="rating" value="M18"> M18
            <input type="radio" name="rating" value="R21"> R21
        <br><br>

        <label>Cinema:</label>
        <input type="text" name="cinema" required>
        <br><br>

        <label>Screen:</label>
            <input type="radio" name="screen" value="A" required> A
            <input type="radio" name="screen" value="B"> B
            <input type="radio" name="screen" value="C"> C
            <input type="radio" name="screen" value="D"> D
            <input type="radio" name="screen" value="E"> E
        <br><br>

        <button type="submit" name="add_movie">Add Movie</button>
    </form>
    <br>

    <a href="viewmovies.php">
        <button>View Movies</button>
    </a>    
</body>
</html>

<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "db_movie");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_movie"])) {
    $name = $_POST['name'];
    $genres = $_POST['genres'];
    $description = $_POST['description'];

    $sql = "INSERT INTO moviedetails (name, genres, description) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sss", $name, $genres, $description);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Movie added successfully!";
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

        <button type="submit" name="add_movie">Add Movie</button>
    </form>
    <br>

    <a href="viewmovies.php">
        <button>View Movies</button>
    </a>    
</body>
</html>

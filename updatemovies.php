<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "csad");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $movie_id = $_POST["movie_id"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $rating = $_POST["movieRating"];
    $genres = isset($_POST["genre"]) ? implode(",", $_POST["genre"]) : "";

    // Handle banner upload if provided
    if (!empty($_FILES["banner"]["name"])) {
        $banner_path = "uploads/" . basename($_FILES["banner"]["name"]);
        move_uploaded_file($_FILES["banner"]["tmp_name"], $banner_path);
    } else {
        $banner_path = $_POST["existing_banner"];
    }

    // Handle poster upload as BLOB
    if (!empty($_FILES["poster"]["name"])) {
        $poster = file_get_contents($_FILES["poster"]["tmp_name"]);
    } else {
        $poster = null; // Keep the existing BLOB if no new file is uploaded
    }

    // Prepare SQL update statement
    if ($poster) {
        // If a new poster is uploaded, update it
        $sql = "UPDATE movies SET name=?, description=?, poster=?, genre=?, rating=?, banner_path=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $name, $desc, $poster, $genres, $rating, $banner_path, $movie_id);
        $stmt->send_long_data(2, $poster); // Send BLOB data
    } else {
        // If no new poster, keep the existing BLOB
        $sql = "UPDATE movies SET name=?, description=?, genre=?, rating=?, banner_path=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $name, $desc, $genres, $rating, $banner_path, $movie_id);
    }

    if ($stmt->execute()) {
        echo "<script>
                alert('Movie updated successfully!');
                window.location.href = 'admin.php?page=viewMovie'; 
              </script>";
        exit(); // Stop script execution after redirection 
    }

    mysqli_stmt_close($stmt);

    // Redirect back
    header("Location: admin.php?page=viewMovie");
    exit();
}
?>

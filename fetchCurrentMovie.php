<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "csad");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if an ID is provided
if (!isset($_GET['id'])) {
    die("Error: No movie ID provided.");
}

$movie_id = $_GET['id'];
$sql = "SELECT * FROM movies WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $movie_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Error: Movie not found.");
}

$movie = mysqli_fetch_assoc($result);
?>
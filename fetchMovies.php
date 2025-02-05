<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "csad");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM movies";
$result = mysqli_query($db, $sql);
if (!$result) {
    die("Query Failed: " . mysqli_error($db)); // Prints MySQL error if query fails
}
?>



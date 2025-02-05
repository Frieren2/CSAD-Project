<?php
session_start();

// 1. Connect to the database
$db = mysqli_connect("localhost", "root", "", "csad");

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables
$name = "";
$desc = "";
$rating = "";
$genres = "";
$bannerPath = "";
$posterData = null;

// Check if the form was submitted
if (isset($_POST['add'])) { //Ensures that add button is clicked and 

    // 2. Collect Form Data
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $rating =  $_POST['movieRating'];
    
    // Convert genres array to comma-separated string
    $genres = isset($_POST['genre']) ? implode(', ', $_POST['genre']) : ''; //Converts the array into a comma-separated string

    // 3. Handle Poster Upload (BLOB Data)
    if (isset($_FILES['poster']) && $_FILES['poster']['error'] === UPLOAD_ERR_OK) { //ensures the file was uploaded without errors.
        $posterData = file_get_contents($_FILES['poster']['tmp_name']); //reads the poster file's binary data and stores it in $posterData (for database storage as a BLOB).
    }

    // 4. Handle Banner Upload (File Path)
    if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {  
        $fileName = $_FILES['banner']['name']; //Gets the original file name.
        $fileTmpPath = $_FILES['banner']['tmp_name']; //Gets the temporary file path.
        $newFileName = time() . '_' . $fileName; //provides a temporary file name 
        $destination = __DIR__ . '/uploads/' . $newFileName; //defines the storage path 

        if (move_uploaded_file($fileTmpPath, $destination)) {  //Moves the banner file from the temporary location to the uploads folder.
             // If move is successful, store the path to DB
            $bannerPath = 'uploads/' . $newFileName; 
        } else {
            $_SESSION['message'] = "Error moving the uploaded banner!";
            header("Location: admin.php?page=addMovie");
            exit();
        }
    }

    // 5. Insert into Database (Using Prepared Statements for BLOB)
    $sql = "INSERT INTO movies (name, description, poster, genre, rating, banner_path) 
            VALUES (?, ?, ?, ?, ?, ?)"; //The ? are placeholders for values
    
    $stmt = mysqli_prepare($db, $sql); //is used to prepare an SQL statement for execution. mysqli_prepare(connection, query)
    mysqli_stmt_bind_param($stmt, "sssssb", $name, $desc, $genres, $rating, $bannerPath, $posterData); //sssssb stands for the datatypes

    if ($stmt->execute()) {
        echo "<script>
                alert('Movie added successfully!');
                window.location.href = 'admin.php?page=addMovie'; 
              </script>";
        exit(); // Stop script execution after redirection 
    }

    mysqli_stmt_close($stmt);

    // Redirect back
    header("Location: admin.php?page=addMovie");
    exit();
}
?>

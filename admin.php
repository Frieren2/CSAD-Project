<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinema</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/addMovie.css">
    <link rel="stylesheet" href="css/addShow.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/tables.css">
    
</head>
<body>
<?php include 'sidebar.php';?>
<?php
        // Determine which page to display based on the "page" query parameter
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $validPages = ['homepage', 'addMovie', 'viewMovie','addShow','booking','viewShow','logout'];
            if (in_array($page, $validPages)) {
                include "$page.php";
            } else {
                echo "<h1>Page not found</h1>";
            }
        } else {
            // Default page is home
            include 'homepage.php';
        }
        ?>
        <script src="javascript/addMovie.js"></script>
        <script src="javascript/addShow.js"></script>
</body>
</html>
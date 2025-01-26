<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinema</title>
    <link rel="stylesheet" href="css/styles.css">
    <?php
    // Default values
    $page = 'home'; // Default page
    $stylesheet = "css/styles.css";

    if (isset($_GET['page'])) {
        // Sanitize and trim the input
        $page = trim(preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['page']));
    }

    // Determine the stylesheet and page to include
    switch ($page) {
        case 'home':
            $stylesheet = 'css/home.css';
            $script = "javascript/scroll.js";
            echo "<script src='$script'></script>";
            break;
        case 'theatres':
            $stylesheet = 'css/ui.css';
            break;
        case 'tickets':
            $stylesheet = 'css/tickets.css';
            break;
        case 'movie-details':
            $stylesheet = 'css/movie-details.css';
            break;
        default:
            $page = '404'; // Handle invalid pages
            $stylesheet = 'css/404.css';
            break;
    }

    echo "<title>Absolute Cinema - " . ucfirst($page) . "</title>";
    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>";
    echo "<link rel='stylesheet' href='$stylesheet'>";
   
    ?>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">

    <?php
    // Include the correct page content
    switch ($page) {
        case 'home':
            include 'home.php';
            break;
        case 'theatres':
            include 'theatres.php';
            break;
        case 'tickets':
            include 'tickets.php';
            break;
        case 'movie-details':
            include 'movie-details.php';
            break;
        default:
            echo "<h1>Page not found</h1>";
            break;
    }
    ?>
    
</div>

    <div id="login-modal" class="modal hidden">
        <div class="modal-content">
            <span class="close" id="close-login">&times;</span>
            <h2>Login</h2>
            <form method="post" action="something.php">
                <label for="username">Email:</label>
                <input type="text" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button class="button" type="submit">Login</button>
            </form>
        </div>
    </div>

    <div id="signup-modal" class="modal hidden">
        <div class="modal-content">
            <span class="close" id="close-signup">&times;</span>
            <h2>Signup</h2>
            <form>
                <label for="new-username">Email:</label>
                <input type="text" id="new-email" name="new-email" required>
                <label for="new-password">Password:</label>
                <input type="password" id="new-password" name="new-password" required>
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <button class="button" type="submit">Signup</button>
            </form>
        </div>
    </div>

    <script src="javascript/scripts.js"></script>
</body>
</html>

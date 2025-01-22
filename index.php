<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinema</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <?php
        // Determine which page to display based on the "page" query parameter
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $validPages = ['home', 'theatres', 'tickets'];
            if (in_array($page, $validPages)) {
                include "$page.php";
            } else {
                echo "<h1>Page not found</h1>";
            }
        } else {
            // Default page is home
            include 'home.php';
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

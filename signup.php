<!DOCTYPE html>
<?php include 'server.php'; ?>
<html>
<head>
    <title>Signup</title>
</head>
<body>
    <?php if(isset($_SESSION['message'])): ?>
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    <?php endif ?>
    <h2>Signup Form</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" >
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="signup">Sign Up</button>
    </form>
</body>
</html>

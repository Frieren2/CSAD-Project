<!DOCTYPE html>
<?php 
session_start();
include 'checklogin.php'; 
?>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($_SESSION['message'])): ?>
        <p style="color:red;"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif ?>
    <form action="checklogin.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>

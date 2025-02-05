<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = mysqli_connect("localhost", "root", "", "db_movie");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, email, hashedpassword, role FROM userlogin WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $db_email, $hashed_password, $role);
    $stmt->fetch(); 

    if ($id) {

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_email'] = $db_email;
            $_SESSION['role'] = $role;

            if ($role == "admin") {
                echo "Admin login successful!";
                header("Location: adminmain.php");
            } else {
                echo "User login successful!";
                header("Location: usermain.php");
            }
        } else {   
            $_SESSION['message'] = "Invalid password. Please try again.";
            header("Location: login.php"); // Redirect back to login page
            exit();
        }

    } else {
        $_SESSION['message'] = "No account found with this email.";
        header("Location: login.php"); // Redirect back to login page
        exit();
    }


    $stmt->close();
}

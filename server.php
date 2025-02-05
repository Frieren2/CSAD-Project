<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "db_movie");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = "user";

    $sql = "SELECT id FROM userlogin WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['message'] = "Sign Up Unsuccessful <br> Email already in use, please try another email.";
        header("Location: signup.php");
        exit();
    }

    $stmt->close();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO userlogin (email, password, hashedpassword, role) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssss", $email, $password, $hashed_password, $role);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Sign Up Successful";
            header("Location: login.php"); // Redirect to login page after signup
            exit();
        } else {
            $_SESSION['message'] = "Sign Up Unsuccessful: " . $stmt->error;
            header("Location: signup.php"); // Redirect back to signup page
            exit();
        }

        $stmt->close();
    } else {
        $_SESSION['message'] = "Error preparing statement: " . $db->error;
        header("Location: signup.php");
        exit();
    }
}

$db->close();
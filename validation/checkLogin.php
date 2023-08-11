<?php
session_start();
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phoneOrEmail = $_POST['phone-email'];
    $passwordUser = $_POST['password'];

    $servername = "only.test";
    $username = "root";
    $password = "";
    $dbname = "onlytest";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $phoneOrEmail = $conn->real_escape_string($phoneOrEmail); // Защита от SQL-инъекции

    $sql = "SELECT * FROM users WHERE email = '$phoneOrEmail' OR phone = '$phoneOrEmail'";
    $result = $conn->query($sql);
    $conn->close();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($passwordUser, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['login'];
            header("Location: account.php");
            exit;
        } else {
            $errors[] = "Invalid password.";
        }
    } else {
        $errors[] = "User not found.";
    }
}

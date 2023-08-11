<?php

$errors = array();
$formSubmitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $passwordUser = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];


    if (!preg_match('/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/', $phone)) {
        $errors[] = "Invalid phone number format.";
    }

    if (strlen($passwordUser) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($passwordUser !== $password_repeat) {
        $errors[] = "Passwords do not match.";
    }

    $formSubmitted = true;

    $servername = "only.test";
    $username = "root";
    $password = "";
    $dbname = "onlytest";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($formSubmitted && empty($errors)) {
        $hashedPassword = password_hash($passwordUser, PASSWORD_DEFAULT);
        try {
            $sql = "INSERT INTO users (login, phone, email, password) VALUES ('$login', '$phone', '$email', '$hashedPassword')";
            if ($conn->query($sql) === FALSE) {
                $errors[] = $conn->error;
            }
        } catch (mysqli_sql_exception $exception) {
            if ($exception->getCode() == 1062) {
                $errors[] = "User with this email, login, or phone already exists.";
            } else {
                $errors[] = $exception->getMessage();
            }
        }
    }

    $conn->close();
}

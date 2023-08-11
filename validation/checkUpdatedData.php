<?php
session_start();

$errors = array();
$formSubmitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newLogin = $_POST['login'];
    $newPhone = $_POST['phone'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    $newPasswordRepeat = $_POST['password_repeat'];

    if (!preg_match('/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/', $newPhone)) {
        $errors[] = "Invalid phone number format.";
    }

    if (strlen($newPassword) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($newPassword !== $newPasswordRepeat) {
        $errors[] = "Passwords do not match.";
    }

    // Обновление данных пользователя в базе данных
    $servername = "only.test";
    $username = "root";
    $password = "";
    $dbname = "onlytest";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $login = $_SESSION['username'];

    $formSubmitted = true;

    if ($formSubmitted && empty($errors)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        try {
            $sql = "UPDATE users SET login = '$newLogin', phone = '$newPhone', email = '$newEmail', password = '$hashedPassword' WHERE login = '$login'";
            if ($conn->query($sql) === FALSE) {
                $errors[] = "Error updating user data: " . $conn->error;
            }
        } catch (mysqli_sql_exception $exception) {
                $errors[] = $exception->getMessage();
        }
    }

//    // Подготовка и выполнение SQL-запроса для обновления данных
//    $sql = "UPDATE users SET login = '$newLogin', phone = '$newPhone', email = '$newEmail', password = '$newPassword' WHERE login = '$login'";
//    if ($conn->query($sql) === FALSE) {
//        $errors[] = "Error updating user data: " . $conn->error;
//    } else{
//        $formSubmitted = true;
//    }
    $conn->close();
}

<?php
session_start();
if (!$_SESSION['loggedin']) {
    print_r($_SESSION);
    header("Location: index.php"); // Перенаправляем на страницу входа, если пользователь не вошел
    exit;
}

$servername = "only.test";
$username = "root";
$password = "";
$dbname = "onlytest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE login = '$username'";
$result = $conn->query($sql);

$user = $result->fetch_assoc();

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Only</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<?php require 'validation/checkUpdatedData.php' ?>

<div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
<!--            <li><a href="index.php" class="nav-link px-2">Home</a></li>-->
            <li><a href="#" class="nav-link px-2">Account</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <a href="logout.php" class="btn btn-primary me-2">Logout</a>
        </div>
    </header>
</div>

<div class="container col-md-5 order-md-1 mt-5">
    <h4 class="mb-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Account</font></font>
    </h4>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger print-error-msg">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (empty($errors) && $formSubmitted): ?>
        <div class="alert alert-success">
            <ul>
                <li>Changes saved!</li>
            </ul>
        </div>
    <?php endif; ?>

    <form id="accountForm" action="" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="login"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">Login</font></font></label>
                <input type="text" class="form-control" name="login" id="login" placeholder="" value="<?php echo $user['login']; ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phone
                            number</font></font></label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="+7 (XXX) XXX-XX-XX"
                       value="<?php echo $user['phone']; ?>" required>

            </div>
        </div>

        <div class="mb-3">
            <label for="email"><font style="vertical-align: inherit;"><font
                        style="vertical-align: inherit;">Email</font></font></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="<?php echo $user['email']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="password"><font style="vertical-align: inherit;"><font
                        style="vertical-align: inherit;">Password</font></font></label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="mb-3">
            <label for="password_repeat"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Repeat
                        password</font></font></label>
            <input type="password" class="form-control" name="password_repeat" id="password_repeat" required>
        </div>

        <button class="btn btn-primary btn-submit" type="submit"><font style="vertical-align: inherit;"><font
                    style="vertical-align: inherit;">Save</font></font></button>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>

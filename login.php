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
<?php require 'blocks/header.php' ?>
<?php require 'validation/checkLogin.php' ?>

<div class="container col-md-4 order-md-1 mt-5">
    <h4 class="mb-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Login</font></font>
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

    <form id="loginForm" action="" method="POST">
        <div class="mb-3">
            <label for="phone-email"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phone
                        number or Email</font></font></label>
            <input type="text" class="form-control" name="phone-email" id="phone-email" placeholder="" value="" required>
        </div>

        <div class="mb-3">
            <label for="password"><font style="vertical-align: inherit;"><font
                        style="vertical-align: inherit;">Password</font></font></label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="mb-4 mt-4 col-md-3">
            <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
            <div
                style="height: 100px"
                id="captcha-container"
                class="smart-captcha"
                data-hl="en"
                data-sitekey="ysc1_NUWdsL6kmYVMEUeK9Q0uAzc7JolbzdRhJOxCOQr1a88e9123"
            ></div>
        </div>

        <button class="btn btn-primary btn-submit" type="submit"><font style="vertical-align: inherit;"><font
                    style="vertical-align: inherit;">Login</font></font></button>
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

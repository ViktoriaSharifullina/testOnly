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
<?php require 'validation/checkRegistration.php' ?>

<div class="container col-md-5 order-md-1 mt-5">
    <h4 class="mb-3"><font style="vertical-align: inherit;"><font
                style="vertical-align: inherit;">Registration</font></font></h4>

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
                <li>Registration completed successfully!</li>
            </ul>
        </div>
    <?php endif; ?>

    <form id="registrationForm" action="" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="login"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">Login</font></font></label>
                <input type="text" class="form-control" name="login" id="login" placeholder="" value="" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phone
                            number</font></font></label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="+7 (XXX) XXX-XX-XX"
                       value="" required>

            </div>
        </div>

        <div class="mb-3">
            <label for="email"><font style="vertical-align: inherit;"><font
                        style="vertical-align: inherit;" >Email</font></font></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
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
                    style="vertical-align: inherit;">Sign-up</font></font></button>

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

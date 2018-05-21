<?php 
session_start();
if(isset($_SESSION['username'])) {
    header("location: http://customer.audirentur.com/homepage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Audirentur: Customer Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="http://customer.audirentur.com/img/logo.png" />
    <!--CSS-->
    <link rel="stylesheet" type="text/css" media="screen" href="http://customer.audirentur.com/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="http://customer.audirentur.com/css/fontawesome-all.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="http://customer.audirentur.com/css/floating-labels.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="http://customer.audirentur.com/css/login.css" />
</head>
<body>
    <br>
    <div class="container">
        <h1>Audirentur</h1>
        <form class="form-signin" role="form" action="" method="POST">
            <div class="form-label-group">
                <input type="text" id="username" class="form-control" placeholder="Username" name="user" required autofocus autocomplete="off">
                <label for="username"><i class="fas fa-user"></i> Username</label>
            </div>
            <div class="form-label-group">
                <input type="password" id="password" class="form-control" placeholder="Password" name="pass" required>
                <label for="password"><i class="fas fa-lock"></i> Password</label>
            </div>
            <button class="btn btn-lg btn-light btn-block" type="submit" name="login"><i class="fas fa-sign-in-alt"></i> Sign in</button>
        </form>
    </div>
    <?php include 'login.php' ?>
    <footer>
        <span>© Copyright 2018 Audirentur</span>
    </footer>
    <!--JAVASCRIPT-->
    <script src="http://customer.audirentur.com/js/jquery-3.3.1.js"></script>
    <script src="http://customer.audirentur.com/js/bootstrap.min.js"></script>
    <script src="http://customer.audirentur.com/js/login.js"></script>
</body>
</html>
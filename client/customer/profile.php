<?php include 'session.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Audirentur: Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="http://customer.audirentur.com/img/logo.png" />
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="http://customer.audirentur.com/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://customer.audirentur.com/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="http://customer.audirentur.com/css/profile.css">
    <link rel="stylesheet" type="text/css" href="http://customer.audirentur.com/css/userbar.css">
</head>
<body>
    <?php include 'userbar.php' ?>
    <div class="container bg-light-transparent" id="profile">
        <br>
        <div class="text-center text-dark">
            <?php
                if($_SESSION['avatar'] === NULL) {
                    if($_SESSION['gender'] == "Male") {
                        echo '<img src="img/default_avatar_male.jpg" id="profile-picture" width="270px" height="270px">';
                    } else {
                        echo '<img src="img/default_avatar_female.jpg" id="profile-picture" width="270px" height="270px">';
                    }
                } else {

                }
                echo '<h1>'. $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] .'</h1>';
                echo '<h4>@' . $_SESSION['username'] . '</h4>';
            ?>
        </div>
        <hr>
        <div class="text-dark">
            <h3><i class="fa fa-id-card"></i> Bio</h3>
            <?php
                if($_SESSION['bio'] === NULL) {
                    echo '<h5> &nbsp; &nbsp; &nbsp; This user is too lazy to add a bio.</h5>';
                } else {
                    echo '<h5> &nbsp; &nbsp; &nbsp; ' . $_SESSION['bio'] . '</h5>';
                }
            ?>
            <br>
            <h3><i class="fa fa-venus-mars"></i> Gender</h3>
            <?php echo '<h5> &nbsp; &nbsp; &nbsp ' . $_SESSION['gender'] . '</h5>'; ?>
            <br>
            <h3><i class="fa fa-phone"></i> Contact Number</h3>
            <?php echo '<h5> &nbsp; &nbsp; &nbsp ' . $_SESSION['contact'] . '</h5>'; ?>
            <br>
            <h3><i class="fa fa-at"></i> Email Address</h3>
            <?php echo '<h5> &nbsp; &nbsp; &nbsp ' . $_SESSION['email'] . '</h5>'; ?>
            <br>
            <h6 class="text-center">Please contact admin if you want to your account to be modified or rather be deleted.</h6>
        </div>
    </div>
    <footer>
        <span>© Copyright 2018 Audirentur</span>
    </footer>
    <!--JAVASCRIPT-->
    <script src="http://customer.audirentur.com/js/jquery-3.3.1.js"></script>
    <script src="http://customer.audirentur.com/js/bootstrap.min.js"></script>
</body>
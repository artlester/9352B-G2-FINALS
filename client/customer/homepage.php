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
    <link rel="stylesheet" type="text/css" href="http://customer.audirentur.com/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="http://customer.audirentur.com/css/userbar.css">
</head>
<body>
    <?php include 'userbar.php'; ?>
    <div class="welcome text-center" id="welcome">
        <br>
        <h1 id="logo">Audirentur</h1>
        <h3 id="logo">The online rental for sound systems at the best and most affordable price!</h3>
        <br><br>
        <form>
        <div class="container input-group">
            
                <input class="form-control py-2" type="search" placeholder="Search for systems...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
        
        </div>
        </form>
    </div>
    <div class="categories text-center" id="categories">
        <br>
        <h1>Categories</h1>
        <div class="section group text-center">
	        <div class="col span_1_of_5">
                <a href="http://customer.audirentur.com/showProducts.php?category=microphones" class="text-dark">
                    <img src="http://customer.audirentur.com/img/studio.png">
                    <br><br>
                    <h3>Microphones</h3>
                </a>
	        </div>
            <div class="col span_1_of_5">
                <a href="http://customer.audirentur.com/showProducts.php?category=speakers" class="text-dark">
                    <img src="http://customer.audirentur.com/img/boombox.png">
                    <br><br>
                    <h3>Speakers</h3>
                </a>
            </div>
            <div class="col span_1_of_5">
                <a href="http://customer.audirentur.com/showProducts.php?category=mixing-boards" class="text-dark">
                    <img src="http://customer.audirentur.com/img/mixing.png">
                    <br><br>
                    <h3>Mixing Boards</h3>
                </a>
            </div>
            <div class="col span_1_of_5">
                <a href="http://customer.audirentur.com/showProducts.php?category=amplifiers" class="text-dark">
                    <img src="http://customer.audirentur.com/img/amplifier.png">
                    <br><br>
                    <h3>Amplifiers</h3>
                </a>
            </div>
            <div class="col span_1_of_5">
                <a href="http://customer.audirentur.com/showProducts.php?category=bundles" class="text-dark">
                    <img src="http://customer.audirentur.com/img/sound-system.png">
                    <br><br>
                    <h3>Bundles</h3>
                </a>
            </div>  
        </div>
    </div>
    <footer>
        <span>© Copyright 2018 Audirentur</span>
    </footer>
    <!--JAVASCRIPT-->
    <script src="http://customer.audirentur.com/js/jquery-3.3.1.js"></script>
    <script src="http://customer.audirentur.com/js/bootstrap.min.js"></script>
</body>
</html>
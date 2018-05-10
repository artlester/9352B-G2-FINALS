<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registration Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" media="screen">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>

<div class="signin-form">

    <div class="container">


        <form class="form-signin" method="post" id="register-form">

            <h2 class="form-signin-heading">Sign Up</h2><hr />

            <div id="error">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
            </div>

            <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="user_password" id="user_password" />
            </div>

            <div class="form-group">
            <input type="text" class="form-control" placeholder="Lastname" name="last_name" id="last_name" />
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Firstname" name="first_name" id="first_name" />
            </div>

            <p>Gender</p>
            <div class="form-group">
                <input type="radio" name="gender" value="male" > Male
                <input type="radio" name="gender" value="female"> Female
                <input type="radio" name="gender" value="other"> Other  
            </div>

            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input type="number" class="form-control" placeholder="Contact" name="contact" id="contact" />
            </div>

            <p>Please select your Account Type:</p>
            <div class="form-group">
                <input type="radio" name="role" value="customer" > Customer
                <input type="radio" name="role" value="Serviceprovider"> Service Provider
            </div>
           
            <hr />

            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-save" id="btn-submit">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create
                </button>
            </div>
        </form>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
/* User login process, checks if user exists and password is correct */

$username = $mysqli->escape_string($_POST['user']);
$result = $mysqli->query("SELECT * FROM customers WHERE cust_username='$username'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    echo '<script>alert("User Does Not Exist!");<script/>';
    header("location: index.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['pass'], $user['cust_password']) ) {
        
        $_SESSION['username'] = $user['cust_username'];
        $_SESSION['first_name'] = $user['cust_first_name'];
        $_SESSION['last_name'] = $user['cust_last_name'];
    
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else {
        echo '<script>alert("You have entered a wrong password!");<script/>';
    }
}


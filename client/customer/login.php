<?php
        require('db.php');
        if(isset($_POST['login'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        
        $query = "SELECT * FROM customers WHERE cust_username='$username' AND cust_password='$password' AND acc_status='Accepted'";
        $pend = "SELECT * FROM customers WHERE cust_username='$username' AND cust_password='$password' AND acc_status='Pending'";
        $deny = "SELECT * FROM customers WHERE cust_username='$username' AND cust_password='$password' AND acc_status='Denied'";
        $ban = "SELECT * FROM customers WHERE cust_username='$username' AND cust_password='$password' AND acc_status='Disabled'";
      
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        $count = mysqli_num_rows($result);

        $deny_result = mysqli_query($mysqli, $deny) or die(mysqli_error($mysqli));
        $deny_count = mysqli_num_rows($deny_result);

        $pen_result = mysqli_query($mysqli, $pend) or die(mysqli_error($mysqli));
        $pen_count = mysqli_num_rows($pen_result);

        $ban_result = mysqli_query($mysqli, $ban) or die(mysqli_error($mysqli));
        $ban_count = mysqli_num_rows($ban_result);
      
        if($count == 1) {
            $account = mysqli_query($mysqli,"SELECT * FROM customers WHERE cust_username='$username'");
            $_SESSION['username'] = $username;
            while($rows = mysqli_fetch_assoc($account)) {
                $_SESSION['lastname'] = $rows["cust_last_name"];
                $_SESSION['firstname'] = $rows["cust_first_name"];
                $_SESSION['gender'] = $rows["cust_gender"];
                $_SESSION['email'] = $rows["cust_email"];
                $_SESSION['contact'] = $rows["cust_contact_number"];
                $_SESSION['avatar'] = $rows["cust_avatar"];
                $_SESSION['bio'] = $rows["cust_bio"];
            }
            header("location: http://customer.audirentur.com/homepage.php");
            exit;
        }elseif($pen_count == 1) {
            echo '<script>alert("Your account is still in evaluation! Please contact admin.");</script>';
        }elseif($deny_count == 1) {
            echo '<script>alert("Your account has been declined! Please contact admin.");</script>';
        } elseif($ban_count == 1) {
            echo '<script>alert("Your account has been dismissed! Please contact admin.");</script>';
        }else {
            echo '<script>alert("Username or password is incorrect! Please try again.");</script>';
        }
      }
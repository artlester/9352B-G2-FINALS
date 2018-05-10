<?php

require_once 'dbconfig.php';

if($_POST)
{
    $user_name 		= $_POST['user_name'];
    $user_password  = $_POST['user_password'];
    $last_name      = $_POST['last_name'];
    $first_name      = $_POST['first_name'];
    $gender      = $_POST['gender'];
    $user_email 	= $_POST['user_email'];
    $contact     = $_POST['contact'];
    $role      = $_POST['role'];
    $joining_date 	= date('Y-m-d H:i:s');
	

	$password 	= password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 11));
	
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM tbl_users WHERE user_email=:email");
        $stmt->execute(array(":email"=>$user_email));
        $count = $stmt->rowCount();
		
        if($count==0){
            $stmt = $db_con->prepare("INSERT INTO tbl_users(user_name,user_password,last_name,first_name,gender,user_email,contact,role,joining_date) VALUES(:uname, :pass, :lname, :fname, :gender, :email, :con, :role, :jdate)");
            $stmt->bindParam(":uname",$user_name);
            $stmt->bindParam(":pass",$password);
            $stmt->bindParam(":lname",$last_name);
            $stmt->bindParam(":fname",$first_name);
            $stmt->bindParam(":gender",$gender);
            $stmt->bindParam(":email",$user_email);
            $stmt->bindParam(":con",$contact);
            $stmt->bindParam(":role",$role);
            $stmt->bindParam(":jdate",$joining_date);

            if($stmt->execute())
            {
                echo "registered";
            }
            else
            {
                echo "Query could not execute !";
            }

        }
        else{

            echo "1";
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>
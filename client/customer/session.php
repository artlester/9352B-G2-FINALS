<?php 
session_start();
if(isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
} else {
    header("location: http://customer.audirentur.com/index.php");
    exit;
}
?>
<?php
    if(isset($_POST['key'])){
        header('location:http://customer.audirentur.com/showProducts.php?key='. $_POST['key']);
    }else {
        echo '<script>alert("You have entered nothing. Please use the search bar productively. Thank you!");</script>';
    }
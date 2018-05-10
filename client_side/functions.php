<?php

define('DBINFO','mysql:host=localhost;dbname=clientnotification');
define('DBUSER','root');
define('DBPASS','');

function fetchAll($query){
    
    try{
    $con = new PDO(DBINFO,DBUSER,DBPASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $con->query($query);
    return $stmt->fetchAll();
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function performQuery($query){
    
    $con = new PDO(DBINFO,DBUSER,DBPASS);
    $stmt = $con->prepare($query);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

?>
    
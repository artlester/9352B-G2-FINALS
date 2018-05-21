<?php
define("hostname",'localhost');
define("user",'root');
define("password",'');
define("mysql_database",'audirentur');

$mysqli = new mysqli(hostname,user,password,mysql_database) or die($mysqli->error);

?>
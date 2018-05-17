<?php
define("hostname",'192.168.254.103:3306');
define("user",'audirentur');
define("password",'Audirentur2018;');
define("mysql_database",'audirentur');

$mysqli = new mysqli(hostname,user,password,mysql_database) or die($mysqli->error);

?>
<?php
    $host = ;
    $
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div class="body">
<h2><p align="center">AUDIRENTUR</p></h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <h3>Username</h3>
        <input type="text" placeholder="Enter Username" name="uname" required>
        <h3>Password</h3>
        <input type="password" placeholder="Enter Password" name="psw" required>  
        <input type="submit" value="Login">
      <label>
        <input type="checkbox" checked="checked" name="remember"><label for="remember">Remember me</label>
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
</div>


</body>
<script  src="js/index.js"></script>
</html>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Admin Login Page</title>
        <style>
            body{
                background-image: url('/img/AMBG.jpg');
            }
            p{
                margin-top:300px;
                margin-left: 550px;
            }
            p1{
                margin-left: 150px;
            }
        </style>
    </head>
    <body>
        <form align="center" action="Login" method="post">
            <p>Enter Username: <input type="text" name="uname"><br><br>
                Enter Password: <input type="password" name="pass"><br><br>
            <p1><input type="submit" value="Login"></p1>
        </form>
    </body>
</html>

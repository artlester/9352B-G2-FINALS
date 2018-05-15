<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>User Management Page</title>
    </head>
    <body>
        
        <%
            response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate");
            response.setHeader("Pragma", "no-cache");
            response.setHeader("Expires", "0");
            if(session.getAttribute("username")==null)
            {
                response.sendRedirect("login.jsp");
            }
        %>
        
        <a href="dashboard.jsp">Dashboard</a>
        <form action="Logout">
                <input type="submit" value="Logout">
            </form>
    </body>
</html>

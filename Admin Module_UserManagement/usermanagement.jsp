<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>User Management</title>
    </head>
    <a href="dashboard.jsp">Dashboard</a><br>
        <form action="Logout">
                <input type="submit" value="Logout">
            </form>
        <p><br/></p>
        <div class="row">
            <div class="col-md-6"><h3>User Management</h3></div>
        </div>
        <p></p>
        <table class="table table-hover table-striped">
                <tr>
                    <td><b>ID</b></td>
                    <td><b>Name</b></td>
                    <td><b>Email</b></td>
                    <td><b>Account Type</b></td>
                    <td><b>Status</b></td>
                    <td><b>Action</b></td>
                </tr>
            <tbody>
                <%
                String Host = "jdbc:mysql://localhost:3306/audirentur";
                Connection connection = null;
                Statement statement = null;
                ResultSet rs = null;
                Class.forName("com.mysql.jdbc.Driver");
                connection = DriverManager.getConnection(Host, "root", "");
                statement = connection.createStatement();
                String Data = "select * from registrations";
                rs = statement.executeQuery(Data);
                while (rs.next()) {
                %>
                <tr>
                    <td><%=rs.getString("reg_id")%></td>
                    <td><%=rs.getString("username")%></td>
                    <td><%=rs.getString("email")%></td>
                    <td><%=rs.getString("accountType")%></td>
                    <td><%=rs.getString("status")%></td>
                    <td>
                        <a href='edit.jsp?u=<%=rs.getString("reg_id")%>' class="btn btn-warning">Edit</a><br><br>
                        <a href='delete.jsp?d=<%=rs.getString("reg_id")%>' class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <%
                }
                %>
            </tbody>
        </table>  
</html>
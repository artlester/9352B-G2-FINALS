<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>List of Clients</title>
    </head>
    <body><table>
        <%@page import="java.sql.Connection"%>
            <%@page import="java.sql.DriverManager"%>
            <%@page import="java.sql.PreparedStatement"%>
            <%@page import="java.sql.ResultSet"%>
            <%@page import="java.sql.Statement"%>

            <%  
                response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate");
                response.setHeader("Pragma", "no-cache");
                response.setHeader("Expires", "0");
            
                    if(session.getAttribute("username")==null)
                {
                response.sendRedirect("login.jsp");
            }
                String result = "SELECT * from registrations where status='Accepted';";
                String url = "jdbc:mysql://localhost:3306/audirentur";

                try {
                    Class.forName("com.mysql.jdbc.Driver");
                    Connection con = DriverManager.getConnection(url, "root", "");
                    Statement st = con.createStatement();
                    ResultSet rSet = st.executeQuery(result);
                    while (rSet.next()) {
                        
            %>
            <a href="dashboard.jsp">Dashboard</a><br>
            <form action="Logout">
                <input type="submit" value="Logout">
            </form>
            <br>
            <br>
            <tr>
                <td><b>Registration ID</b></td>
                <td><b>Username</b></td>
                <td><b>Password</b></td>
                <td><b>LastName</b></td>
                <td><b>FirstName</b></td>
                <td><b>Gender</b></td>
                <td><b>E-Mail</b></td>
                <td><b>Contact Number</b></td>
                <td><b>Account Type</b></td>
                <td><b>Status</b></td>
            </tr>
            <tr>
                <td><%=rSet.getString("reg_id")%></td>
                <td><%=rSet.getString("username")%></td>
                <td><%=rSet.getString("password")%></td>
                <td><%=rSet.getString("last_name")%></td>
                <td><%=rSet.getString("first_name")%></td>
                <td><%=rSet.getString("gender")%></td>
                <td><%=rSet.getString("email")%></td>
                <td><%=rSet.getString("contact_number")%></td>
                <td><%=rSet.getString("accountType")%></td>
                <td><%=rSet.getString("status")%></td>
            </tr>

            <%
                    }
                } catch(Exception e) {
                    e.printStackTrace();
                }
            %>
    </body>
</html>

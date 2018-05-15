<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Transaction Monitoring</title>
    </head>
    <body>
        <table>
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
                String result = "SELECT customers.customer_id, customers.cust_first_name, customers.cust_last_name, vendors.ven_first_name, vendors.ven_last_name, rentals.rental_id, rentals.rental_date, rentals.return_date, rentals.status FROM customers JOIN rentals ON customers.customer_id = rentals.customer_id JOIN vendors ON vendors.vendor_id = rentals.vendor_id;";
        
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
                <td><b>Customer_ID</b></td>
                <td><b>Customer_FirstName</b></td>
                <td><b>Customer_Last_Name</b></td>
                <td><b>Vendor_FirstName</b></td>
                <td><b>Vendor_LastName</b></td>
                <td><b>Rental_ID</b></td>
                <td><b>Rental_Date</b></td>
                <td><b>Return_Date</b></td>
                <td><b>Status</b></td>
            </tr>
            <tr>
                <td><%=rSet.getString("customer_id")%></td>
                <td><%=rSet.getString("cust_first_name")%></td>
                <td><%=rSet.getString("cust_last_name")%></td>
                <td><%=rSet.getString("ven_first_name")%></td>
                <td><%=rSet.getString("ven_last_name")%></td>
                <td><%=rSet.getString("rental_id")%></td>
                <td><%=rSet.getString("rental_date")%></td>
                <td><%=rSet.getString("return_date")%></td>
                <td><%=rSet.getString("status")%></td>
            </tr>

            <%
                    }
                } catch(Exception e) {
                    e.printStackTrace();
                }
            %>

        </table>
    </body>
</html>

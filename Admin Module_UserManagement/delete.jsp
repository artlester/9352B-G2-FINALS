<%@page import="java.sql.Statement"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%
String reg_id=request.getParameter("d");
int no=Integer.parseInt(reg_id);
try {
    Class.forName("com.mysql.jdbc.Driver").newInstance();
    Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/audirentur", "root", "");
    Statement st = conn.createStatement();
    st.executeUpdate("DELETE FROM registrations WHERE reg_id = '"+no+"'");
    response.sendRedirect("usermanagement.jsp");
} catch(Exception e){}
%>
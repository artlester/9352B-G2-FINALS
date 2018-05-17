<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.PreparedStatement"%>
<%@page import="java.sql.Connection"%>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Edit Users</title>
    </head>
        <p><br/></p>
        <%
        String Host = "jdbc:mysql://localhost:3306/audirentur";
        Connection connection = null;
        Statement statement = null;
        ResultSet rs = null;
        PreparedStatement ps=null;
        Class.forName("com.mysql.jdbc.Driver").newInstance();
        connection = DriverManager.getConnection(Host, "root", "");
        %>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6"><h3>Edit/Update Data</h3></div>
                    <div class="col-md-6 text-right">
                        <a href="usermanagement.jsp" class="btn btn-info">Back to Home</a>
                    </div>
                </div>
                <p></p>
                <form action="" method="post">
                    <%
                    statement = connection.createStatement();
                    String u=request.getParameter("u");
                    int num=Integer.parseInt(u);
                    String Data = "select * from registrations where reg_id='"+num+"'";
                    rs = statement.executeQuery(Data);
                    while (rs.next()) {
                    %>   
                    <input type="hidden" name="id" value='<%=rs.getString("reg_id")%>'/>
                    <div class="form-group">
                        <label for="myname">Username</label>
                        <input type="text" class="form-control" id="myuname" name="um" value='<%=rs.getString("username")%>'>
                    </div>
                    <div class="form-group">
                        <label for="myemail">Email address</label>
                        <input type="email" class="form-control" id="myemail" name="em" value='<%=rs.getString("email")%>'>
                    </div>
                    <div class="form-group">
                        <label for="mytpye">Account Type</label>
                        <input type="text" class="form-control" id="mytype" name="at" value='<%=rs.getString("accountType")%>'>
                    </div>
                    <div class="form-group">
                        <label for="mystatus">Status</label>
                        <input type="text" class="form-control" id="mystatus" name="st" value='<%=rs.getString("status")%>'>
                    </div>
                    <%   
                    }
                    %>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>  
</html>
<%
String a=request.getParameter("id");
String b=request.getParameter("um");
String c=request.getParameter("em");
String d=request.getParameter("at");
String e=request.getParameter("st");
int updateQuery = 0;
if(a!=null && b!=null && c!=null && d!=null && e!=null){
    try{
        String query="update registrations set username=?,email=?,accountType=?,status=? where reg_id='"+a+"'";
        ps=connection.prepareStatement(query);
        ps.setString(1,b);
        ps.setString(2,c);
        ps.setString(3,d);
        ps.setString(4,e);
        updateQuery=ps.executeUpdate();
        if(updateQuery!=0){
            response.sendRedirect("usermanagement.jsp");
        }
    }catch(Exception ex){
        out.println("(Your Status Account Type Input is Invalid) (Status: Accepted)(Account Type: Service Provider/Customer)");
    }finally{
        ps.close();
        connection.close();
    }
}
%>
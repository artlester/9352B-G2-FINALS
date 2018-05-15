import com.mysql.jdbc.PreparedStatement;
import java.sql.DriverManager;
import java.sql.Connection;
import java.sql.ResultSet;


public class LoginDB {
    
    String sql = "select * from adminlogin where uname=? and pass=?";
    String url = "jdbc:mysql://localhost:3306/test";
    String username = "root";
    String password = "";
    public boolean check(String uname,String pass){
        
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection con = DriverManager.getConnection(url,username,password);
            PreparedStatement st = (PreparedStatement) con.prepareStatement(sql);
            st.setString(1, uname);
            st.setString(2, pass);
            ResultSet rs = st.executeQuery();
            if(rs.next())
            {
                return true;
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return false;
    }
}

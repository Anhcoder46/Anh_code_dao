/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

import java.sql.Connection;
import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author ASUS
 */
public class UserDB implements DatabaseInfoo {

    public static ArrayList<Users> getListUser() {
        ArrayList<Users> res = new ArrayList<>();
        try (Connection con = DatabaseInfoo.getConnect()) {
            PreparedStatement ps = con.prepareStatement("select * from users");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                res.add(new Users(rs.getString(1), rs.getString(2), rs.getString(3), rs.getString(4), rs.getString(5),rs.getString(6), rs.getDate(7), rs.getString(8)));
            }
        } catch (Exception e) {
        }
        return res;
    }

    public static int addNewUser(Users newUser) {
        int res = -1;
        try (Connection con = DatabaseInfoo.getConnect()) {
            PreparedStatement ps = con.prepareStatement("insert into Users values (?,?,?,?,?,?,?,?)");
            ps.setString(1, newUser.getUserID());
            ps.setString(2, newUser.getUserAccount());
            ps.setString(3, newUser.getUserName());
            ps.setString(4, newUser.getUserPassword());
            ps.setString(5, newUser.getPhone());
            ps.setString(6, newUser.getGender());
            ps.setDate(7, newUser.getUserDOB());
            ps.setString(8, newUser.getUserSkills());
            res = ps.executeUpdate();
        } catch (Exception e){
            Logger.getLogger(UserDB.class.getName()).log(Level.SEVERE,null,e);
        }
        return res;
    }
    public static Users getUser(String account){
        Users res = new Users();
        try( Connection con = DatabaseInfoo.getConnect()){
            PreparedStatement ps = con.prepareStatement("Select * from Users where UserAccount = ?");
            ps.setString(1, account);
            ResultSet rs =ps.executeQuery();
            if (rs.next()){
                res= new Users(rs.getString(1), rs.getString(2), rs.getString(3), rs.getString(4), rs.getString(5),rs.getString(6), rs.getDate(7), rs.getString(8));
                return res;
            }
        } catch (Exception e){
            Logger.getLogger(UserDB.class.getName()).log(Level.SEVERE,null,e);
        }
        return null;
    }
    
    
    public static Users login(String acc, String pass){
        Users u = getUser(acc);
        if(u != null && u.getUserPassword().equals(pass)){
            return u;
        }
        return null;
    }
    
    
}

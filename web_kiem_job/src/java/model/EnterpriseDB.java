/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author ASUS
 */
public class EnterpriseDB implements DatabaseInfoo {

    public static ArrayList<Enterprise> getListEnterprise() {
        ArrayList<Enterprise> res = new ArrayList<>();
        try (Connection con = DatabaseInfoo.getConnect()) {
            PreparedStatement ps = con.prepareStatement("select * from Enterprise");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                res.add(new Enterprise(rs.getString(1), rs.getString(2), rs.getString(3), rs.getString(4), rs.getString(5), rs.getString(6), rs.getString(7), rs.getString(8)));

            }
        } catch (Exception e) {
        }
        return res;
    }

    public static int addNewEnter(Enterprise newEnter) {
        int res = -1;
        try (Connection con = DatabaseInfoo.getConnect()) {
            PreparedStatement ps = con.prepareStatement("insert into Enterprise values (?,?,?,?,?,?,?,?)");
            ps.setString(1, newEnter.getEnterpriseID());
            ps.setString(2, newEnter.getEnterpriseAccount());
            ps.setString(3, newEnter.getEnterpriseName());
            ps.setString(4, newEnter.getEnterprisePassword());
            ps.setString(5, newEnter.getPhone());
            ps.setString(6, newEnter.getTaxcode());
            ps.setString(7, newEnter.getPlace());
            ps.setString(8, newEnter.getEnterpriseDesc());

            res = ps.executeUpdate();
        } catch (Exception e) {
            Logger.getLogger(EnterpriseDB.class.getName()).log(Level.SEVERE, null, e);
        }
        return res;
    }

    public static Enterprise getEnter(String account) {
        Enterprise res = new Enterprise();
        try (Connection con = DatabaseInfoo.getConnect()) {
            PreparedStatement ps = con.prepareStatement("Select * from Enterprise where EnterpriseAccount = ?");
            ps.setString(1, account);
            ResultSet rs = ps.executeQuery();
            if(rs.next()){
                res = new Enterprise(rs.getString(1), rs.getString(2), rs.getString(3), rs.getString(4), rs.getString(5), rs.getString(6), rs.getString(7), rs.getString(8));
                return res;
            }
        }catch (Exception e){
            Logger.getLogger(EnterpriseDB.class.getName()).log(Level.SEVERE,null,e);
        }
        return null;
    }
    
    public static Enterprise login(String acc, String pass){
        Enterprise e = getEnter(acc);
        if(e != null && e.getEnterprisePassword().equals(pass)){
            return e;
        }
        return null;
    }

}

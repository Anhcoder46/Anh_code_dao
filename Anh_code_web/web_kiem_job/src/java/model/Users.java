/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

import controller.SignUpServlet;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author ASUS
 */
public class Users {
    private String UserID;
    private String UserAccount;
    private String UserName;
    private String UserPassword;
    private String Phone;
    private String Gender;
    private java.sql.Date UserDOB;
    private String UserSkills;
    
    public Users(){}

    public Users(String UserAccount, String UserName, String UserPassword, String Phone, String Gender, String UserDOB, String UserSkills) {
        this.UserID = newID();
        this.UserAccount = UserAccount;
        this.UserName = UserName;
        this.UserPassword = UserPassword;
        this.Phone = Phone;
        this.Gender = Gender;
        this.UserDOB = formatDate(UserID);
        this.UserSkills = UserSkills;
    }
    
    public Users(String UserAccount, String UserName, String UserPassword, String Phone, String Gender, java.sql.Date UserDOB, String UserSkills) {
        this.UserID = newID();
        this.UserAccount = UserAccount;
        this.UserName = UserName;
        this.UserPassword = UserPassword;
        this.Phone = Phone;
        this.Gender = Gender;
        this.UserDOB = UserDOB;
        this.UserSkills = UserSkills;
    }

    public Users(String UserID,String UserAccount, String UserName, String UserPassword, String Phone, String Gender, java.sql.Date UserDOB, String UserSkills) {
        this.UserID = UserID;
        this.UserAccount = UserAccount;
        this.UserName = UserName;
        this.UserPassword = UserPassword;
        this.Phone = Phone;
        this.Gender = Gender;
        this.UserDOB = UserDOB;
        this.UserSkills = UserSkills;
    }

    public String getUserID() {
        return UserID;
    }

    public void setUserID(String UserID) {
        this.UserID = UserID;
    }

    public String getUserAccount() {
        return UserAccount;
    }

    public void setUserAccount(String UserAccount) {
        this.UserAccount = UserAccount;
    }

    public String getUserName() {
        return UserName;
    }

    public void setUserName(String UserName) {
        this.UserName = UserName;
    }

    public String getUserPassword() {
        return UserPassword;
    }

    public void setUserPassword(String UserPassword) {
        this.UserPassword = UserPassword;
    }

    public String getPhone() {
        return Phone;
    }

    public void setPhone(String Phone) {
        this.Phone = Phone;
    }

    public String getGender() {
        return Gender;
    }

    public void setGender(String Gender) {
        this.Gender = Gender;
    }

    public java.sql.Date getUserDOB() {
        return UserDOB;
    }

    public void setUserDOB(java.sql.Date UserDOB) {
        this.UserDOB = UserDOB;
    }

    public String getUserSkills() {
        return UserSkills;
    }

    public void setUserSkills(String UserSkills) {
        this.UserSkills = UserSkills;
    }
    
    
    public String newID(){
        if(UserDB.getListUser().isEmpty())
            return "user100";
        ArrayList<Users> listUser  = UserDB.getListUser();
        for( Users users : listUser){
            String numID = users.getUserID().substring(4);
            String nextID = "user"+ (Integer.parseInt(numID)+1);
            if( !isDupplicatedID(nextID)){
                return nextID;
            }
        }
        return null;
    }
    
    public boolean isDupplicatedID(String id){
        ArrayList<Users> listUser = UserDB.getListUser();
        for( Users users : listUser){
            if(users.getUserID().equals(id)) return true;
        }
        return false;
    }
    
    public Users(Users u ){
        this(u.getUserID(),u.getUserAccount(),u.getUserName(),u.getUserPassword(),u.getPhone(),u.getGender(),u.getUserDOB(),u.getUserSkills());
    }
    
    public boolean isDupplicatedAccount() {
        ArrayList<Users> listUsers =  UserDB.getListUser();
        for (Users user : listUsers) {
            if (user.getUserAccount().equals(this.UserAccount)) return true;
        }
        return false;
    }
    
    public int addNew(){
        return UserDB.addNewUser(this);
    }

    @Override
    public String toString() {
        return "Users{" + "UserID=" + UserID + ", UserAccount=" + UserAccount + ", UserName=" + UserName + ", UserPassword=" + UserPassword + ", Phone=" + Phone + ", Gender=" + Gender + ", UserDOB=" + UserDOB + ", UserSkills=" + UserSkills + '}';
    }
    
    public static java.sql.Date formatDate(String str){
        SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
        java.sql.Date result=null;
        try {
            result = new java.sql.Date(sdf.parse(str).getTime()) ;
        } catch (ParseException ex) {
            Logger.getLogger(SignUpServlet.class.getName()).log(Level.SEVERE, null, ex);
        }
        return result;
    }
    
    public Users login (String acc,String pass){
        return UserDB.login(acc, pass);
    }
}

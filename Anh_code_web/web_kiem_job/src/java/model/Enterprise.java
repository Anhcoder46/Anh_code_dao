/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

import java.util.ArrayList;
import java.util.Date;

/**
 *
 * @author ASUS
 */
public class Enterprise {
    private String EnterpriseID;
    private String EnterpriseAccount;
    private String EnterpriseName;
    private String EnterprisePassword;
    private String Phone;
    private String Taxcode;
    private String Place;
    private String EnterpriseDesc;

    public Enterprise() {
    }
    
    public Enterprise(String EnterpriseAccount, String EnterpriseName, String EnterprisePassword, String Phone, String Taxcode, String Place, String EnterpriseDesc) {
        this.EnterpriseID = newEnterID();
        this.EnterpriseAccount = EnterpriseAccount;
        this.EnterpriseName = EnterpriseName;
        this.EnterprisePassword = EnterprisePassword;
        this.Phone = Phone;
        this.Taxcode = Taxcode;
        this.Place = Place;
        this.EnterpriseDesc = EnterpriseDesc;
    }
    
    public Enterprise(String EnterpriseID, String EnterpriseAccount, String EnterpriseName, String EnterprisePassword, String Phone, String Taxcode, String Place, String EnterpriseDesc) {
        this.EnterpriseID = EnterpriseID;
        this.EnterpriseAccount = EnterpriseAccount;
        this.EnterpriseName = EnterpriseName;
        this.EnterprisePassword = EnterprisePassword;
        this.Phone = Phone;
        this.Taxcode = Taxcode;
        this.Place = Place;
        this.EnterpriseDesc = EnterpriseDesc;
    }

    public String getEnterpriseID() {
        return EnterpriseID;
    }

    public void setEnterpriseID(String EnterpriseID) {
        this.EnterpriseID = EnterpriseID;
    }

    public String getEnterpriseAccount() {
        return EnterpriseAccount;
    }

    public void setEnterpriseAccount(String EnterpriseAccount) {
        this.EnterpriseAccount = EnterpriseAccount;
    }

    public String getEnterpriseName() {
        return EnterpriseName;
    }

    public void setEnterpriseName(String EnterpriseName) {
        this.EnterpriseName = EnterpriseName;
    }

    public String getEnterprisePassword() {
        return EnterprisePassword;
    }

    public void setEnterprisePassword(String EnterprisePassword) {
        this.EnterprisePassword = EnterprisePassword;
    }

    public String getPhone() {
        return Phone;
    }

    public void setPhone(String Phone) {
        this.Phone = Phone;
    }

    public String getTaxcode() {
        return Taxcode;
    }

    public void setTaxcode(String Taxcode) {
        this.Taxcode = Taxcode;
    }

    public String getPlace() {
        return Place;
    }

    public void setPlace(String Place) {
        this.Place = Place;
    }

    public String getEnterpriseDesc() {
        return EnterpriseDesc;
    }

    public void setEnterpriseDesc(String EnterpriseDesc) {
        this.EnterpriseDesc = EnterpriseDesc;
    }
    
    public String newEnterID(){
        if(EnterpriseDB.getListEnterprise().isEmpty())
            return "Enterprise100";
        ArrayList<Enterprise> listEnterprise  = EnterpriseDB.getListEnterprise();
        for( Enterprise enterprise : listEnterprise){
            String numID = enterprise.getEnterpriseID().substring(10);
            String nextID = "Enterprise"+ (Integer.parseInt(numID)+1);
            if( !isDupplicatedID(nextID)){
                return nextID;
            }
        }
        return null;
    }
    
    public boolean isDupplicatedID(String id){
        ArrayList<Enterprise> listEnterprise = EnterpriseDB.getListEnterprise();
        for( Enterprise enterprise : listEnterprise){
            if(enterprise.getEnterpriseID().equals(id)) return true;
        }
        return false;
    }
    public boolean isDupplicatedAccount() {
        ArrayList<Enterprise> listEnterprise =  EnterpriseDB.getListEnterprise();
        for (Enterprise enterprise : listEnterprise) {
            if (enterprise.getEnterpriseAccount().equals(this.EnterpriseAccount)) return true;
        }
        return false;
    }
    
    public int addNew(){
        return EnterpriseDB.addNewEnter(this);
    }
    
    public Enterprise login(String acc , String pass){
        return EnterpriseDB.login(acc, pass);
    }
}

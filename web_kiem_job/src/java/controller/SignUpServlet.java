/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */
package controller;

import java.io.IOException;
import java.io.PrintWriter;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import model.Users;

/**
 *
 * @author ASUS
 */
public class SignUpServlet extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet SignUpServlet</title>");
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet SignUpServlet at " + request.getContextPath() + "</h1>");
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        request.getRequestDispatcher("SignUp.jsp").forward(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String useraccount = request.getParameter("account-input").trim();
        String username = request.getParameter("name-input").trim();
        String pass = request.getParameter("pass-input").trim();
        String confirm = request.getParameter("confirm-input").trim();
        String phone = request.getParameter("phone-input").trim();
        String gender = request.getParameter("gender-input").trim();
        String date = request.getParameter("date-input").trim();
        String skills = request.getParameter("skill-input").trim();
        
        String[] inputArray = {useraccount,username,pass,phone,gender,date,skills};
        if(isEmptyInput(inputArray)){
            request.setAttribute("inputError", "Must fill all input");
            request.getRequestDispatcher("SignUp.jsp").forward(request, response);
            return;
        } else if (!isConfirmedPassword(pass, confirm)){
            request.setAttribute("inputError", "Confirm incorrect password!");
            request.getRequestDispatcher("SignUp.jsp").forward(request, response);
            return;
        } else if(!isPhoneNumber(phone)){
            request.setAttribute("inputError", "Invalid phone number!");
            request.getRequestDispatcher("SignUp.jsp").forward(request, response);
            return;
        }
        int id = -1;
        java.sql.Date dt = formatDate(date);
        Users u  = new Users(useraccount,username,pass,phone,gender,dt,skills);
        
        if(u.isDupplicatedAccount()){
            request.setAttribute("inputError", "Account is used. Try another one!");
            request.getRequestDispatcher("SignUp.jsp").forward(request, response);
            return;
        }
        
        id = u.addNew();
        
        
        
        request.setAttribute("notic", "Sign up successfully");
        request.setAttribute("link ", "login.jsp");
        request.setAttribute("subLink", "Login");
        if(id ==1)
            request.getRequestDispatcher("login.jsp").forward(request, response);
    }
    

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

    public static boolean isEmptyInput(String[] s){
        for (int i = 0; i < s.length; i++) {
            if (s[i].isEmpty()) return true;
        }
        return false;
    }
    public static boolean isConfirmedPassword(String pass, String confirm){
        if(confirm.equals(pass)) return true;
        return false;
    }
    public static boolean isPhoneNumber(String phone){
        String pattern = "^\\+?0[0-9]{9}$";
        if (phone.matches(pattern)) return true;
        return false;
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
}

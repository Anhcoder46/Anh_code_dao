/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */
package controller;

import static controller.SignUpServlet.isConfirmedPassword;
import static controller.SignUpServlet.isEmptyInput;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import model.Enterprise;

/**
 *
 * @author ASUS
 */
@WebServlet(name = "SignUpEnterServlet", urlPatterns = {"/SignUpEnterServlet"})
public class SignUpEnterServlet extends HttpServlet {

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
            out.println("<title>Servlet SignUpEnterServlet</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet SignUpEnterServlet at " + request.getContextPath() + "</h1>");
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
        request.getRequestDispatcher("SignUpEnterprise.jsp").forward(request, response);
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
        String EnterpriseAccount = request.getParameter("account-input").trim();
        String EnterpriseName = request.getParameter("name-input").trim();
        String passEnter = request.getParameter("pass-input").trim();
        String confirm = request.getParameter("confirm-input").trim();
        String EnterPhone = request.getParameter("phone-input").trim();
        String EnterPlace = request.getParameter("place-input").trim();
        String EnterDesc = request.getParameter("desc-input").trim();
        String Tax = request.getParameter("tax-input").trim();
        
        String[] inputArray ={EnterpriseAccount,EnterpriseName,passEnter,EnterPhone,EnterPlace,EnterDesc,Tax};
        if(isEmptyInput(inputArray)){
            request.setAttribute("inputError", "Must fill all input");
            request.getRequestDispatcher("SignUp.jsp").forward(request, response);
            return;
        } else if (!isConfirmedPassword(passEnter, confirm)){
            request.setAttribute("inputError", "Confirm incorrect password!");
            request.getRequestDispatcher("SignUp.jsp").forward(request, response);
            return;
        }
        int id = -1;
        Enterprise e = new Enterprise(EnterpriseAccount,EnterpriseName,passEnter,EnterPhone,Tax,EnterPlace,EnterDesc);
        
        if(e.isDupplicatedAccount()){
            request.setAttribute("inputError", "Account is used. Try another one!");
            request.getRequestDispatcher("SignUp.jsp").forward(request, response);
            return;
        }
        
        id= e.addNew();
        
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
}

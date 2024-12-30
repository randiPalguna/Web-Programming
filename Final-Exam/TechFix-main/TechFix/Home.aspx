<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Home.aspx.cs"
Inherits="Home" %>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #1e1e2f, #2d2d47);
        color: #e0e0ff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .container {
        background-color: #2b2b40;
        border-radius: 10px;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.7);
        padding: 30px;
        text-align: center;
        width: 90%;
        max-width: 500px;
      }

      h1 {
        font-size: 2.5rem;
        color: #00bcd4;
        margin-bottom: 20px;
      }

      .nav-menu {
        list-style: none;
        padding: 0;
        margin: 20px 0;
      }

      .nav-menu li {
        margin: 10px 0;
      }

      .nav-menu a {
        text-decoration: none;
        font-size: 1.2rem;
        padding: 10px 20px;
        color: #e0e0ff;
        background-color: #394867;
        border: 2px solid #00bcd4;
        border-radius: 5px;
        transition: 0.3s ease-in-out;
      }

      .nav-menu a:hover {
        background-color: #00bcd4;
        color: #1e1e2f;
      }

      .logout {
        color: #ff4081;
        text-decoration: none;
        font-size: 1rem;
        margin-top: 20px;
        display: inline-block;
      }

      .logout:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Welcome, <asp:Label ID="lblUsername" runat="server"></asp:Label></h1>
      <ul class="nav-menu">
        <li><a href="Service.aspx">Manage Services</a></li>
        <li>
          <a
            class="logout"
            href="javascript:window.location='Home.aspx?logout=true';"
            >Logout</a
          >
        </li>
      </ul>
    </div>
  </body>
</html>

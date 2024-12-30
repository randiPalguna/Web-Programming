<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Register.aspx.cs"
Inherits="Register" %>
<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
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

      h2 {
        font-size: 2rem;
        color: #00bcd4;
        margin-bottom: 20px;
      }

      label {
        font-size: 1rem;
        color: #cfcfcf;
        display: block;
        text-align: left;
        margin: 10px 0 5px;
      }

      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        background: #394867;
        border: 2px solid #00bcd4;
        border-radius: 5px;
        color: #e0e0ff;
        font-size: 1rem;
        box-sizing: border-box;
      }

      input[type="text"]:focus,
      input[type="password"]:focus {
        outline: none;
        border-color: #00bcd4;
        box-shadow: 0 0 5px #00bcd4;
      }

      button {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        color: #1e1e2f;
        background-color: #00bcd4;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s ease-in-out;
      }

      button:hover {
        background-color: #00a4c4;
      }

      .message {
        margin: 15px 0;
        font-size: 0.9rem;
        color: red;
      }

      .link {
        margin-top: 20px;
      }

      .link a {
        color: #00bcd4;
        text-decoration: none;
        font-size: 0.9rem;
      }

      .link a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Register</h2>
      <form id="form1" runat="server">
        <label for="Username">Username:</label>
        <asp:TextBox
          ID="txtUsername"
          runat="server"
          placeholder="Enter your username"
        ></asp:TextBox>
        <label for="Password">Password:</label>
        <asp:TextBox
          ID="txtPassword"
          runat="server"
          TextMode="Password"
          placeholder="Enter your password"
        ></asp:TextBox>
        <label for="ConfirmPassword">Confirm Password:</label>
        <asp:TextBox
          ID="txtConfirmPassword"
          runat="server"
          TextMode="Password"
          placeholder="Confirm your password"
        ></asp:TextBox>
        <button
          type="submit"
          runat="server"
          id="btnRegister"
          onserverclick="btnRegister_Click"
        >
          Register
        </button>
        <asp:Label
          ID="lblMessage"
          CssClass="message"
          runat="server"
        ></asp:Label>
      </form>
      <div class="link">
        <asp:HyperLink ID="hlLogin" runat="server" NavigateUrl="Login.aspx">
          Already have an account? Login here
        </asp:HyperLink>
      </div>
    </div>
  </body>
</html>

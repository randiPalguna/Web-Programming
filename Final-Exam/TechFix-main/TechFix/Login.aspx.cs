using System;
using System.Data;
using MySql.Data.MySqlClient;

public partial class Login : System.Web.UI.Page
{
    string cs = "server=localhost;userid=root;password=;database=techfix";

    protected void btnLogin_Click(object sender, EventArgs e)
    {
        string username = txtUsername.Text.Trim();
        string password = txtPassword.Text.Trim();

        using (MySqlConnection conn = new MySqlConnection(cs))
        {
            conn.Open();
            string query = "SELECT * FROM Users WHERE Username = @Username AND PasswordHash = SHA2(@Password, 256)";
            using (MySqlCommand cmd = new MySqlCommand(query, conn))
            {
                cmd.Parameters.AddWithValue("@Username", username);
                cmd.Parameters.AddWithValue("@Password", password);

                using (MySqlDataReader reader = cmd.ExecuteReader())
                {
                    if (reader.HasRows)
                    {
                        Session["Username"] = username;
                        Response.Redirect("Home.aspx");
                    }
                    else
                    {
                        lblMessage.Text = "Invalid username or password.";
                    }
                }
            }
        }
    }
}
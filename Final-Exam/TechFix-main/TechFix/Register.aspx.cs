using System;
using MySql.Data.MySqlClient;

public partial class Register : System.Web.UI.Page
{
    string cs = "server=localhost;userid=root;password=;database=techfix";

    protected void btnRegister_Click(object sender, EventArgs e)
    {
        string username = txtUsername.Text.Trim();
        string password = txtPassword.Text.Trim();
        string confirmPassword = txtConfirmPassword.Text.Trim();

        if (password != confirmPassword)
        {
            lblMessage.Text = "Passwords do not match.";
            return;
        }

        using (MySqlConnection conn = new MySqlConnection(cs))
        {
            conn.Open();
            string query = "INSERT INTO Users (Username, PasswordHash) VALUES (@Username, SHA2(@Password, 256))";
            using (MySqlCommand cmd = new MySqlCommand(query, conn))
            {
                cmd.Parameters.AddWithValue("@Username", username);
                cmd.Parameters.AddWithValue("@Password", password);

                try
                {
                    cmd.ExecuteNonQuery();
                    lblMessage.ForeColor = System.Drawing.Color.Green;
                    lblMessage.Text = "Registration successful. You can now log in.";
                }
                catch (Exception ex)
                {
                    lblMessage.Text = "Error: " + ex.Message;
                }
            }
        }
    }
}

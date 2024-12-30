using System;
using System.Data;
using System.Web.UI.WebControls;
using MySql.Data.MySqlClient;

public partial class _Service : System.Web.UI.Page
{
    string cs = "server=localhost;userid=root;password=;database=TechFix";

    protected void Page_Load(object sender, EventArgs e)
    {
        if (Session["Username"] == null)
        {
            Response.Redirect("Login.aspx");
        }

        if (!IsPostBack)
        {
            BindGrid();
        }
    }

    private void BindGrid()
    {
        string query = "SELECT * FROM Service";

        using (MySqlConnection con = new MySqlConnection(cs))
        {
            using (MySqlDataAdapter adapter = new MySqlDataAdapter(query, con))
            {
                DataSet ds = new DataSet();
                adapter.Fill(ds, "Service");
                GridView1.DataSource = ds.Tables["Service"];
                GridView1.DataBind();
            }
        }
    }

    protected void btnAdd_Click(object sender, EventArgs e)
    {
        string description = txtDescription.Text.Trim();
        string priceText = txtPrice.Text.Trim();
        decimal price;

        if (string.IsNullOrEmpty(description) || !decimal.TryParse(priceText, out price))
        {
            lblMessage.Text = "Invalid input. Please check your data.";
            return;
        }

        string query = "INSERT INTO Service (description, price) VALUES (@description, @price)";

        using (MySqlConnection con = new MySqlConnection(cs))
        {
            using (MySqlCommand cmd = new MySqlCommand(query, con))
            {
                cmd.Parameters.AddWithValue("@description", description);
                cmd.Parameters.AddWithValue("@price", price);

                try
                {
                    con.Open();
                    cmd.ExecuteNonQuery();
                    lblMessage.Text = "Service added successfully.";
                    BindGrid();
                }
                catch (Exception ex)
                {
                    lblMessage.Text = "Error: " + ex.Message;
                }
            }
        }
    }

    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        GridView1.EditIndex = e.NewEditIndex;
        BindGrid();
    }

    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        int id = Convert.ToInt32(GridView1.DataKeys[e.RowIndex].Value);
        string description = ((TextBox)GridView1.Rows[e.RowIndex].Cells[1].Controls[0]).Text.Trim();
        string priceText = ((TextBox)GridView1.Rows[e.RowIndex].Cells[2].Controls[0]).Text.Trim();
        decimal price;

        if (string.IsNullOrEmpty(description) || !decimal.TryParse(priceText, out price))
        {
            lblMessage.Text = "Invalid input. Please check your data.";
            return;
        }

        string query = "UPDATE Service SET description = @description, price = @price WHERE id = @id";

        using (MySqlConnection con = new MySqlConnection(cs))
        {
            using (MySqlCommand cmd = new MySqlCommand(query, con))
            {
                cmd.Parameters.AddWithValue("@id", id);
                cmd.Parameters.AddWithValue("@description", description);
                cmd.Parameters.AddWithValue("@price", price);

                try
                {
                    con.Open();
                    cmd.ExecuteNonQuery();
                    lblMessage.Text = "Service updated successfully.";
                    GridView1.EditIndex = -1;
                    BindGrid();
                }
                catch (Exception ex)
                {
                    lblMessage.Text = "Error: " + ex.Message;
                }
            }
        }
    }

    protected void GridView1_RowCancelingEdit(object sender, GridViewCancelEditEventArgs e)
    {
        GridView1.EditIndex = -1;
        BindGrid();
    }

    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        int id = Convert.ToInt32(GridView1.DataKeys[e.RowIndex].Value);

        string query = "DELETE FROM Service WHERE id = @id";

        using (MySqlConnection con = new MySqlConnection(cs))
        {
            using (MySqlCommand cmd = new MySqlCommand(query, con))
            {
                cmd.Parameters.AddWithValue("@id", id);

                try
                {
                    con.Open();
                    cmd.ExecuteNonQuery();
                    lblMessage.Text = "Service deleted successfully.";
                    BindGrid();
                }
                catch (Exception ex)
                {
                    lblMessage.Text = "Error: " + ex.Message;
                }
            }
        }
    }
}

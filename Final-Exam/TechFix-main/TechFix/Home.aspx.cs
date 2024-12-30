using System;

public partial class Home : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.QueryString["logout"] == "true")
        {
            Session.Clear();
            Session.Abandon();
            Response.Redirect("Login.aspx");
        }

        if (Session["Username"] == null)
        {
            Response.Redirect("Login.aspx");
        }
        lblUsername.Text = Session["Username"].ToString();
    }
}

<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Service.aspx.cs" Inherits="_Service" %>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <style>
        /* General Styling */
        body {
            font-family: 'Montserrat', sans-serif; /* Apply the custom font */
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Sidebar Section */
        .sidebar {
            background-color: #93B5C6;
            padding: 20px;
            width: 30%;
            min-height: 100vh;
            float: left;
            box-sizing: border-box;
            padding-left: 80px;
            padding-right: 80px;
        }

        .sidebar h2 {
            font-size: 50px;
            color: #fff;
            margin-bottom: 30px;
            margin-top: 50px;
        }

        .sidebar label {
            font-size: 30px;
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #fff;
        }

        .sidebar input[type="text"], .aspNet-TextBox {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif; /* Ensure font is applied */
        }

        .sidebar .btn {
            padding: 10px 20px;
            background-color: #fff;
            color: #333;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            text-align: center;
            font-family: 'Montserrat', sans-serif; /* Ensure font is applied */
        }

        .sidebar .btn:hover {
            background-color: #ddd;
        }

        /* Main Content Section */
        .main-content {
            width: 70%;
            float: left;
            padding: 30px;
            box-sizing: border-box;
            padding-left: 100px;
            padding-right: 100px;
            font-size: 20px;
        }

        .main-content h2 {
            margin-bottom: 30px;
            font-size: 50px;
            font-family: 'Montserrat', sans-serif; /* Ensure font is applied */
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 8px; /* Reduced padding */
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-family: 'Montserrat', sans-serif; /* Ensure font is applied */
        }

        table th {
            background-color: #f5f5f5;
        }

        table tr:hover {
            background-color: #f9f9f9;
        }

        .action-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            text-decoration: none; /* Ensure no underline */
            display: inline-block; /* Allows padding */
            color: #fff; /* Text color */
        }

        .action-btn.edit {
            background-color: #ffc107;
        }

        .action-btn.delete {
            background-color: #dc3545;
        }

        .action-btn.update {
            background-color: #28a745;
        }

        .action-btn.cancel {
            background-color: #6c757d;
        }

        .action-btn:hover {
            opacity: 0.9;
        }

        /* Message Styling */
        .success-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            font-size: 14px;
            display: none; /* Hidden by default */
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
        <div class="sidebar">
            <h2>Add New Service</h2>
            <label for="txtDescription">Description</label>
            <asp:TextBox ID="txtDescription" runat="server" CssClass="aspNet-TextBox"></asp:TextBox>
            <label for="txtPrice">Price</label>
            <asp:TextBox ID="txtPrice" runat="server" CssClass="aspNet-TextBox"></asp:TextBox>
            <asp:Button ID="btnAdd" Text="Add" CssClass="btn" OnClick="btnAdd_Click" runat="server" />
        </div>

        <div class="main-content">
            <h2>Manage Services</h2>
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" DataKeyNames="id"
                OnRowEditing="GridView1_RowEditing" OnRowUpdating="GridView1_RowUpdating"
                OnRowCancelingEdit="GridView1_RowCancelingEdit" OnRowDeleting="GridView1_RowDeleting"
                CssClass="service-grid">
                <Columns>
                    <asp:BoundField DataField="id" HeaderText="ID" ReadOnly="True" />
                    <asp:BoundField DataField="description" HeaderText="Description" />
                    <asp:BoundField DataField="price" HeaderText="Price" DataFormatString="Rp{0:N2}" />
                    
                    <asp:CommandField ShowEditButton="True" ShowDeleteButton="True" HeaderText="Update"
                        EditText="<span class='action-btn edit'>Edit</span>"
                        DeleteText="<span class='action-btn delete'>Delete</span>"
                        UpdateText="<span class='action-btn update'>Update</span>"
                        CancelText="<span class='action-btn cancel'>Cancel</span>" />
                </Columns>
            </asp:GridView>
            <br />
            <asp:Label ID="lblMessage" runat="server" ForeColor="Red" />
        </div>
    </form>
</body>
</html>

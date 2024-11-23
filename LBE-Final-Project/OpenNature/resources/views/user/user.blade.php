<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .header {
            background: linear-gradient(to right, #0cbaba, #4de66e);
            padding: 14px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-and-menu {
            display: flex;
            align-items: center;
            margin-left: 12px;
            margin-right: 15px;
        }
        .menu {
            margin-left: 20px;
            margin-right: -5px;
        }
        .menu a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-size: 18px;
        }
        .menu a:hover {
            color: #ffdd57;
        }
        .user-logo {
            width: 35px;
            height: 35px;
            background-color: white;
            border-radius: 50%;
        }
        #brand-icon {
            width: 40px;
            height: 40px;
            margin-top: -5px;
        }
        #user-icon {
            width: 28px;
            height: 28px;
            margin-top: -4px;
        }
        table {
            width: 35%; /* Increase width a bit for better layout */
            margin: 20px auto;
            background-color: #fff;
            border-collapse: separate; /* Allow border-radius on table */
            border-spacing: 0; /* Remove gaps between table elements */
            border-radius: 8px; /* Round the corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow for card-like effect */
            overflow: hidden; /* Prevent overflow of rounded corners */
        }
        td, th {
            padding: 12px; /* Adjust padding for better spacing */
            border-bottom: 1px solid #ddd; /* Soft border inside table */
        }
        tr:last-child td {
            border-bottom: none; /* Remove bottom border for the last row */
        }
        th {
            background-color: #4caf50; /* Header background */
            color: white;
            text-align: left;
        }
        td {
            font-size: 16px;
            color: #333;
        }
        /* Add vertical line */
        td:first-child {
            border-right: 1px solid #ddd; /* Vertical line color and width */
        }        
        h2 {
            text-align: center;
            color: #333;
        }
        @media (max-width: 1200px) {
            .header {
                padding: 20px; /* Tambahkan padding agar header terlihat lebih besar */
            }
            .menu a {
                font-size: 22px; /* Perbesar ukuran font menu */
            }

            .logo-and-menu {
                margin-left: 15px; /* Sesuaikan margin */
                margin-right: 20px;
            }

            .user-logo, #brand-icon, #user-icon {
                width: 45px; /* Perbesar logo */
                height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-and-menu">
            <img id="brand-icon" src="{{ asset('/icon/logo.jpg') }}" alt="Logo">
            <div class="menu">
                <a href="./product">Products</a>
                <a href="./transaction">Transactions</a>
            </div>
        </div>
        <div class="logo-and-menu">
            <div class="menu">
                <a href="./user">User</a>
            </div>
            <img id="user-icon" src="{{ asset('/icon/user.jpg') }}" alt="User Icon">
        </div>
    </div>

    <h2>User Dashboard</h2>

    <table>
        <tbody>
            <tr>
                <td>ID</td>
                <td>{{ $user['user-id'] }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $user['user-name'] }}</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>{{ str_repeat('*', strlen($user['user-password'])) }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $user['user-email'] }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>

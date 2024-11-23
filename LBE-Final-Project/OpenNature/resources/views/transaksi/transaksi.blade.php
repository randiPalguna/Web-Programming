<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Dashboard</title>
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
        #coin-icon {
            width: 18px;
            height: 18px;
            margin-bottom: -2px;
        }
        .container {
            width: 60%;
            margin: 25px auto;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 25px;
        }
        .product-card {
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex; /* Use flexbox to align the image and content in a row */
            align-items: center; /* Align items vertically */
        }
        .product-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px; /* Add space between the image and text */
        }
        .product-card .info {
            display: flex;
            flex-direction: column; /* Stack the text in a vertical column */
            justify-content: center; /* Center the column vertically next to the image */
        }
        .product-card .info p {
            margin: 5px 0; /* Add some space between the texts */
            font-size: 16px;
            font-weight: bold; /* Make the text bold */
            color: #6c6c6c; /* Set the text color to grey */ successfull
        }
        .product-card .success-text {
            color: green;
            font-weight: bold;
            margin-left: auto;
            margin-right: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: -5px;
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

    <h2>Transaction Dashboard</h2>

    <div class="container">
        <div class="grid">
            @foreach ($transactionPlant as $tr)
                <div class="product-card">
                    <img src="{{ asset('img/' . $tr->plant->{'plant-image'}) }}" alt="Plant Image">
                    <div class="info">
                        <p>Transaction ID: {{ $tr->{'transaction-id'} }}</p>
                        <p>Plant Name: {{ $tr->plant->{'plant-name'} }}</p>
                        <p>
                            Plant Price: {{ $tr->plant->{'plant-price'} }}
                            <img id=coin-icon src="{{ asset('/icon/coin.jpg') }}" alt="coin">
                        </p>
                        <p>Date of Purchase: {{ $tr->{'transaction-date'} }}</p>
                    </div>
                    <span class="success-text">Successful!</span>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>

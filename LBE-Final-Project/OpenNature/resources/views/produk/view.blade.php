<!DOCTYPE html>
<html>
<head>
    <title>NFT Enjoyer</title>
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
            transition: color 0.3s ease;
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
        .container {
            width: 90%;
            margin: 25px auto;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Default 4 columns */
            gap: 40px;
        }
        .product-card {
            background-color: white;
            padding: 20px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        .product-card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            margin-bottom: 10px;
            border-radius: 12px;
        }
        .product-card .price-and-btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product-card .name {
            flex-grow: 1;
            text-align: left;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .product-card .price {
            margin-right: 10px;
            font-size: 18px;
            color: #333;
        }
        .product-card .buy-btn {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-top: -5px;
            transition: background-color 0.3s ease;
        }
        .product-card .buy-btn:hover {
            background-color: #45a049;
        }
        #coin-icon {
            width: 24px;
            height: 24px;
            margin-left: -5px;
            margin-top: 5px;
            margin-right: 10px;
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
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: white;
            padding: 28px;
            border-radius: 12px;
            width: 320px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .modal-content h2 {
            margin-bottom: 15px;
            margin-top: -2px;
            font-size: 24px;
            color: #4caf50;
        }
        .modal-content form div {
            margin-bottom: 20px;
        }
        .modal-content form label {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }
        .modal-content form input {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }
        .modal-content form input:focus {
            border-color: #4caf50;
        }
        .modal-content form button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .modal-content form button:hover {
            background-color: #45a049;
        }
        .close {
            float: right;
            font-size: 20px;
            cursor: pointer;
            color: #333;
        }
        .close:hover {
            color: red;
        }
        @media (max-width: 1200px) {
            .grid {
                grid-template-columns: repeat(2, 1fr); /* 2 kolom pada layar sedang */
            }
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

    <div class="container">
        <div class="grid">
            @foreach ($plant as $pl)
                <div class="product-card">
                    <img src="{{ asset('img/' . $pl->{'plant-image'}) }}" alt="Plant Image">
                    <div class="price-and-btn">
                        <div class="name">{{ $pl->{'plant-name'} }}</div>
                        <div class="price">{{ $pl->{'plant-price'} }}</div>
                        <img id="coin-icon" src="{{ asset('/icon/coin.jpg') }}" alt="coin">
                        <button class="buy-btn" onclick="openModal('{{ $pl->{'plant-id'} }}')">Beli</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal for transaction form -->
    <div id="transactionModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Buy Plant</h2>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <input type="hidden" id="plant-id" name="plant-id-fk"> <!-- Use hidden field -->
                <input type="hidden" id="user-id" name="user-id-fk" value="1"> <!-- Use hidden field -->
                <div>
                    <label for="transaction-id">Transaction ID</label>
                    <input type="text" id="transaction-id" name="transaction-id" required>
                </div>
                <div>
                    <label for="transaction-date">Transaction Date and Time</label>
                    <input type="datetime-local" id="transaction-date" name="transaction-date" required>
                </div>
                <button type="submit">Confirm Purchase</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(plantId) {
            document.getElementById("plant-id").value = plantId;
            document.getElementById("transactionModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("transactionModal").style.display = "none";
        }
    </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Our Website</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: row;
            overflow: hidden;
        }
        .image-container {
            flex: 1;
            background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(215, 182, 136, 1)), url('https://raw.githubusercontent.com/randiPalguna/DishDiary/main/resources/images/fried-brown-rice-12.jpg'); /* Gradient blending with background image */
            background-size: cover; /* Cover the entire area */
            background-position: center; /* Center the image */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(215, 182, 136, 0.9); /* Semi-transparent brown */
            padding: 20px;
            flex-direction: column; /* Stack elements vertically */
            height: 100%; /* Full height */
            color: #333; /* Text color */
            text-align: center; /* Center text */
        }
        /* Styles for the login content */
        h1 {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 10px; /* Reduced margin */
            color: #333; /* Text color */
        }
        h2 {
            font-size: 1.4rem; /* Smaller heading */
            margin-bottom: 30px; /* Space between h2 and button */
            color: #333; /* Text color */
        }
        p {
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            text-decoration: none;
            color: white;
            background-color: #B8860B;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 500;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        .btn:hover {
            background-color: #5e3ae6;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        .form-footer {
            margin-top: 30px;
        }
        a {
            color: #B8860B;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s;
        }
        a:hover {
            color: #4b23dd;
        }
        .menu-line {
            width: 100%; /* Full width */
            height: 2px; /* Line height */
            background-color: #B8860B; /* Line color */
            margin: 20px 0; /* Space around the line */
        }
        @media (max-width: 768px) {
            body {
                flex-direction: column; /* Stack image and login container */
                height: 100vh; /* Full height */
                overflow: hidden; /* Prevent scrolling */
            }
            .image-container {
                flex: 1; /* Full height for image */
                height: 100%; /* Full height */
                position: relative; /* Positioning context */
            }
            .login-container {
                position: absolute; /* Position it over the image */
                top: 0; /* Start from the top */
                left: 0; /* Align to the left */
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                display: flex; /* Flex for centering content */
                flex-direction: column; /* Stack elements vertically */
                justify-content: center; /* Center content vertically */
                align-items: center; /* Center content */
                padding: 20px; /* Ensure padding */
                background-color: rgba(215, 182, 136, 0.8); /* More translucent background */
                z-index: 1; /* Ensure it's on top of the image */
            }
            .menu-line {
                width: 100%; /* Full width */
                height: 2px; /* Line height */
                background-color: #B8860B; /* Line color */
                margin: 20px 0; /* Space around the line */
            }
        }
    </style>
</head>
<body>

    <div class="image-container">
        <!-- Background is now an image -->
    </div>

    <div class="login-container">
        <div class="container">
            <div class="menu-line"></div> <!-- Upper line -->
            <h1>Dish Diary</h1>
            <h2>Dear food you gonna be in my mouth</h2>
            <p>
                <a href="/login" class="btn">Login</a>
            </p>
            <div class="menu-line"></div> <!-- Lower line -->
            <div class="form-footer">
                <p>Don't have an account? <a href="/register">Register</a></p>
            </div>
        </div>
    </div>

</body>
</html>

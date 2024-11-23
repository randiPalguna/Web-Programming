<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f4e3; /* Soft beige background */
            color: #4a4a4a; /* Dark gray text */
            padding: 20px;
            background-image: url('https://raw.githubusercontent.com/randiPalguna/DishDiary/main/resources/images/d8mntmg-f8b9e380-dc8b-4413-81b8-c4909e56a2a3.png'); /* Wood texture */
            background-size: cover; /* Cover the entire area */
            background-attachment: fixed; /* Fixed background */
        }
        .navbar {
            width: 100%;
            background-color: #7a4b3a; /* Dark earthy red for navbar */
            padding: 10px;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            z-index: 1000;
            border-radius: 0 0 10px 10px; /* Rounded bottom corners */
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }
        .navbar .nav-links {
            display: flex;
            gap: 20px;
        }
        .profile-logout {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .navbar .profile-photo {
            background-color: #fff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
        .container {
            max-width: 600px;
            margin: 80px auto 0;
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white for contrast */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #6a4a3c; /* Deep reddish-brown for headers */
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600; /* Bold labels */
        }
        input[type="text"], input[type="file"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #6db65d; /* Earthy green */
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #5aa94e; /* Darker green on hover */
        }
        img {
            margin-top: 10px; /* Space above the image */
            border-radius: 5px; /* Rounded corners for the image */
            border: 2px solid #7a4b3a; /* Earthy red border */
        }
    </style>
</head>
<body>

<div class="navbar">
        <div class="nav-links">
            <a href="/">Home</a>
            <a href="/recipe/bookmark">Bookmarks</a>
        </div>
        <div class="profile-logout">
            <img src="profile-photo-placeholder.png" alt="Profile" class="profile-photo">
            <div class="logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-delete">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Edit a Recipe</h1>
        <form method="post" action="{{ route('recipe.update', ['recipe' => $recipe]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <label>Title</label>
                <input type="text" name="title" value="{{ $recipe->title }}" required />
            </div>
            <div>
                <label>Image</label>
                <input type="file" name="image" />
                @if($recipe->image)
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image" width="100">
                @endif
            </div>
            <div>
                <label>Ingredients</label>
                <input type="text" name="ingredients" value="{{ $recipe->ingredients }}" required />
            </div>
            <div>
                <label>Instructions</label>
                <input type="text" name="instructions" value="{{ $recipe->instructions }}" required />
            </div>
            <div>
                <input type="submit" value="Update" />
            </div>
        </form>
    </div>

</body>
</html>

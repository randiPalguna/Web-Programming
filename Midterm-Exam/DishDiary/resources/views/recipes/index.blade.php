    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recipe List</title>
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
                background-color: #f8f4e3; /* Soft beige background for a vintage feel */
                color: #5a3e32; /* Dark brown text */
                padding: 20px;
                background-image: url('https://raw.githubusercontent.com/randiPalguna/DishDiary/main/resources/images/d8mntmg-f8b9e380-dc8b-4413-81b8-c4909e56a2a3.png'); /* Wood texture */
                background-size: cover; /* Cover the entire area */
                background-attachment: fixed; /* Fixed background */
            }
            h1 {
                text-align: center;
                margin-bottom: 30px;
                color: #6a4a3c; /* Deep reddish-brown for headers */
                font-size: 2.5rem;
            }
            .container {
                max-width: 1200px;
                margin: 0 auto;
                background: rgba(255, 255, 255, 0.9); /* Semi-transparent white for contrast */
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
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
            .navbar .logout {
                margin-left: auto;
            }
            .navbar .profile-photo {
                background-color: #fff;
                border-radius: 50%;
                width: 40px;
                height: 40px;
            }
            .create-recipe {
                text-align: center;
                margin-bottom: 30px;
            }
            .create-recipe a {
                padding: 10px 20px;
                background-color: #6db65d; /* Earthy green */
                color: white;
                border-radius: 5px;
                text-decoration: none;
                font-size: 1.2rem;
                transition: background-color 0.3s;
            }
            .create-recipe a:hover {
                background-color: #5aa94e; /* Darker green on hover */
            }
            .card-grid {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                justify-content: center;
            }
            .card {
                background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent for layering */
                border-radius: 10px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                padding: 20px;
                width: 45%;
                max-width: 500px;
                text-align: center;
                transition: transform 0.2s; /* Scale effect on hover */
            }
            .card:hover {
                transform: scale(1.02); /* Slightly scale up */
            }
            .card img {
                width: 100%;
                height: 200px;
                object-fit: cover;
                border-radius: 5px;
                border: 2px solid #7a4b3a; /* Earthy red border */
            }
            .card h3 {
                margin: 15px 0;
                font-size: 1.5rem;
                color: #3c3c3c; /* Darker text color for card titles */
            }
            .card p {
                margin-bottom: 15px;
                color: #565656; /* Slightly lighter text */
            }
            .card .actions {
                display: flex;
                justify-content: space-around;
                gap: 10px;
            }
            .card .btn {
                padding: 10px;
                background-color: #007BFF; /* Blue buttons */
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            .card .btn:hover {
                background-color: #0056b3; /* Darker blue on hover */
            }
            .card .btn-delete {
                background-color: #dc3545; /* Red for delete */
            }
            .card .btn-delete:hover {
                background-color: #c82333; /* Darker red on hover */
            }
            .card .btn-bookmark {
                background-color: #ffc107; /* Yellow for bookmark */
            }
            .card .btn-bookmark:hover {
                background-color: #e0a800; /* Darker yellow on hover */
            }
            @media (max-width: 768px) {
                .card {
                    width: 100%;
                }
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

        <div class="container" style="margin-top: 80px;">
            <h1>Recipe List</h1>

            <div class="create-recipe">
                <a href="/recipe/create">Create New Recipe</a>
            </div>

            <div class="search-form" style="margin-bottom: 20px;">
                <form method="GET" action="{{ route('recipe.index') }}">
                    <input type="text" name="search" placeholder="Search by title" value="{{ request('search') }}">
                    <button type="submit" class="btn">Search</button>
                </form>
            </div>

            <div class="card-grid">
                @foreach($recipes as $recipe)
                <div class="card">
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
                    <h3>{{ $recipe->title }}</h3>
                    <p>{{ $recipe->ingredients }}</p>
                    <p>{{ $recipe->instructions }}</p>
                    <p>Upvotes: {{ $recipe->upvotes }}</p>
                    <div class="actions">
                        @if(!auth()->user()->hasUpvoted($recipe))
                            <form action="{{ route('recipe.incrementUpvotes', ['recipe' => $recipe]) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn">Increment Upvotes</button>
                            </form>
                        @else
                            <button class="btn" disabled>Already Upvoted</button>
                        @endif
                        <a href="{{ route('recipe.edit', ['recipe' => $recipe]) }}" class="btn">Edit</a>
                        @if(auth()->user()->bookmarkedRecipes->contains($recipe->id))
                            <form action="{{ route('recipe.unbookmark', ['recipe' => $recipe]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-bookmark">Unbookmark</button>
                            </form>
                        @else
                            <form action="{{ route('recipe.bookmark', ['recipe' => $recipe]) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-bookmark">Bookmark</button>
                            </form>
                        @endif
                        <form method="post" action="{{ route('recipe.destroy', ['recipe' => $recipe]) }}" style="display:inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
    </body>
    </html>

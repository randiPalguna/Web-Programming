<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center">DishDiary Report Project</h1>

<br>

## Team Members
| Name                       | NRP        | Course              | Contributions | Role         |
| ---                        | ---        | ---                 | ---           | ---          |
| Randi Palguna Artayasa     | 5025231020 | Web Programming (F) | 33.3 %        | Back End     |
| I Gusti Ngurah Arya Sudewa | 5025231030 | Web Programming (F) | 33.3 %        | Front End    |
| Muhammad Daffa Nurrahman   | 5025231208 | Web Programming (F) | 33.3 %        | Front End    |

<br>

## Demo Video:

- Youtube: https://youtu.be/G1_JBcMewK0

<br>

## Projects Goal Lists and Project Architecture
- <a href="https://list2go.io/en/list/-O9_-WEf6HI6P26MifTM" target="_blank">List2Go</a>
- <a href="https://miro.com/welcomeonboard/WU04dm9Xc0JjdUxCVDBhUDhlNGdsT0hVWXd3ZUJuQnRPRFllSlNzcHhqTTd2WXVYaGVxY2o3YmR3azR4YXVtd3wzNDU4NzY0NTg3MTMzNzk1Njc3fDI=?share_link_id=230823000814" target="_blank">miro</a>

<br><br>

## Requirements

### Installation
> **NOTE:** This project is designed to run on Windows OS and any commands should be executed in PowerShell.
0. Ensure that PHP, MySQL (via XAMPP), Composer, and git are installed on your system:
   - Download XAMPP <a href="https://www.apachefriends.org/download.html" target="_blank">here</a>.
   - Download composer <a href="https://getcomposer.org/Composer-Setup.exe" target="_blank">here</a>. However, you must first install XAMPP and set the PHP path in the environment variables before installing composer.
   - Download git <a href="https://git-scm.com/downloads/win" target="_blank">here</a>. This is needed for composer update later in setup_project.bat file.
   - Check if PHP, Composer, and git are already installed by executing the commands `php -v`, `composer --version`, and `git -v` in PowerShell.
1. Clone the project repository (or alternatively, download the ZIP file of the repository):<br>
   `git clone https://github.com/randiPalguna/DishDiary.git`
2. Navigate to the DishDiary project directory:<br>
   `cd .\DishDiary\`
3. Run the setup_project.bat file and follow the on-screen instructions to complete the laravel setup.<br>
   `.\setup_project.bat`

### App Features
This application provides users with a comprehensive recipe management system, allowing them to create, update, and explore a wide variety of dishes. Below are the key features available:
1. Create Recipes: Users can add their own recipes with ingredients, instructions, and images.
2. View Recipe List: Browse through the full list of available recipes.
3. Update Recipes: Existing recipes can be easily edited to reflect changes or improvements.
4. Delete Recipes: Users have the option to remove recipes they no longer need.
5. Bookmark Recipe Feature: Save favorite recipes to a personalized list for quick access.
6. Upvote Recipe Feature: Users can upvote recipes they enjoy, helping others discover popular dishes.
7. Search Recipe Feature: Quickly find specific recipes by searching titles or keywords.
8. Share Link Feature: Share your favorite recipes with others through a direct link, making it easy to spread inspiration.

<br><br>

## Design

### Database Design
- Conceptual Data Model (CDM):
  ![image](https://github.com/user-attachments/assets/40e8e0b6-1c51-4f4e-ae0e-579688331ecb)
  > Source: https://pastebin.com/aEwev0rf & https://dbdiagram.io/d

- MySQL Physical Data Model (PDM):
  ![image](https://github.com/user-attachments/assets/05ad499b-8773-4ad3-bba7-300feac6c86d)

<br>

### UI Design

![Screenshot 2024-10-25 232509](https://github.com/user-attachments/assets/96714062-d036-49ac-bb29-abcac5b4f2d9)

![Screenshot 2024-10-25 232625](https://github.com/user-attachments/assets/8408a32e-1ce7-420a-a99c-9ba4cefade57)

![Screenshot 2024-10-25 233611](https://github.com/user-attachments/assets/c40e47bc-639e-468f-8ad3-796611fbd92c)

![Screenshot 2024-10-25 232519](https://github.com/user-attachments/assets/0c88d425-1223-4376-a238-c88d38474d1a)

![Screenshot 2024-10-25 232552](https://github.com/user-attachments/assets/428a374c-024d-4b64-b6b8-87c94c4125c0)

![Screenshot 2024-10-25 232540](https://github.com/user-attachments/assets/d12fd41e-dc57-4c94-bbf4-415c21f365a2)

![Screenshot 2024-10-25 232531](https://github.com/user-attachments/assets/016babf9-b8f7-44dc-b2f7-6168b22a1a88)

<br><br>

## Implementation
This project is implemented using the Laravel framework. The core functionality of the application is based on the CRUD (Create, Read, Update, Delete) concept, allowing users to manage recipes efficiently.

Key technologies and tools used:
- Laravel: A powerful PHP framework used for building the core application, handling routes, and providing an MVC structure.
- MySQL: The database system used to store and manage all recipe-related data, including user inputs and categories.
- XAMPP: A local development environment that includes Apache and MySQL, facilitating easy setup and testing of the application.


<br><br>

## Conclusion and Improvement
In conclusion, the DishDiary application provides a streamlined and user-friendly platform for recipe management, enabling users to create, view, update, and share recipes with ease. Through features like upvoting, bookmarking, and recipe search, the application encourages culinary exploration and community engagement. The Laravel framework's robust structure, combined with MySQL for data management, ensures a reliable and efficient experience for users.

@echo off
:: Check PHP version
php -v
IF %ERRORLEVEL% NEQ 0 (
    echo "PHP is not installed or not available globally. Please install PHP or add it to your PATH."
    pause
    exit /b
)
 
echo ===============================================================================================

:: Check composer version
call composer --version
IF %ERRORLEVEL% NEQ 0 (
    echo "composer is not installed or not available globally. Please install composer or add it to your PATH."
    pause
    exit /b
)
 
echo ===============================================================================================
 
:: Prompt user to start XAMPP
echo "Please uncomment [ ;extension=zip ] in your /some_dir/XAMPP/php/php.ini (php configuration) file."
pause
 
echo ===============================================================================================
 
:: Run Composer update
echo "Updating Composer dependencies..."
call composer update
IF %ERRORLEVEL% NEQ 0 (
    echo "Composer update failed. Please check for errors."
    pause
    exit /b
)
 
echo ===============================================================================================
 
:: Generate application key
echo "Generating application key..."
php artisan key:generate
IF %ERRORLEVEL% NEQ 0 (
    echo "Failed to generate application key. Please check for errors."
    pause
    exit /b
)
 
echo ===============================================================================================
 
:: Prompt user to open XAMPP
echo "Please open XAMPP and activate Apache and MySQL."
pause
 
echo ===============================================================================================
 
:: Create session table
echo "Creating session table..."
php artisan session:table
 
 
echo ===============================================================================================
 
:: Run database migrations
echo "Running migrations..."
php artisan migrate
IF %ERRORLEVEL% NEQ 0 (
    echo "Migration failed. Please check for errors."
    pause
    exit /b
)
 
echo ===============================================================================================

:: Run database migrate:fresh if database and its seeds already created 
php artisan migrate:fresh
IF %ERRORLEVEL% NEQ 0 (
    echo "Migration:fresh failed. Please check for errors."
    pause
    exit /b
)
 
echo ===============================================================================================
 
:: Seed the database
echo "Seeding the database..."
php artisan db:seed
IF %ERRORLEVEL% NEQ 0 (
    echo "Database seeding failed. Please check for errors."
    pause
    exit /b
)

echo ===============================================================================================

echo "Linking storage for image upload..."
php artisan storage:link

echo ===============================================================================================

:: Download login system
echo "Downloading package for login system..."
composer require laravel/breeze --development

echo ===============================================================================================

echo "Downloading breeze for login system. Pick blade and enter and enter"
pause
php artisan breeze:install

echo ===============================================================================================

echo "Downloading npm for login system..."
npm install

echo ===============================================================================================

echo "Fill web.php routes after installing breeze to backupWeb.php"
type .\routes\backupWeb.php > .\routes\web.php

echo ===============================================================================================

:: Start Laravel development server
echo "Starting Laravel development server..."
php artisan serve
IF %ERRORLEVEL% NEQ 0 (
 
    echo "Failed to start the development server. Please check for errors."
    pause
    exit /b
)
echo ===============================================================================================

:: Open project in browser
echo "Opening http://localhost:8000 in your browser..."
start http://localhost:8000
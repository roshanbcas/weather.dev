# Setup
This system requires PHP 7 version.

1. Download or clone the project.
2. Run composer install to setup the pqckages.
3. Copy the env file as .env.
        'cp .env.example .env
4. Create a database and connect with the .env file.
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME=root
        DB_PASSWORD=
5. Migrate database to database.
        php artisan migrate
6. Run npm install & npm run dev 
7. Run the LocationSeeder.php file in the database/Seeds/ folder
       php artisan db:seed --class=LocationSeeder
8. Run php artisan serve to run the web server
9. Use http://127.0.0.1:8000 to access the website..

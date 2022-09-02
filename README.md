# Setup
This system requires PHP 7 version.

1. Download or clone the project.
2. Run composer install to setup the pqckages.
3. Copy the env file as .env.
        <p>cp .env.example .env</p>
4. Create a database and connect with the .env file.
        <p>DB_CONNECTION=mysql</p>
        <p>DB_HOST=127.0.0.1</p>
        <p>DB_PORT=3306</p>
        <p>DB_DATABASE=laravel</p>
        <p>DB_USERNAME=root</p>
        <p>DB_PASSWORD=</p>
5. Migrate database to database.
        <p>php artisan migrate</p>
6. Run npm install & npm run dev 
7. Run the LocationSeeder.php file in the database/Seeds/ folder
       <p>php artisan db:seed --class=LocationSeeder</p>
8. Run php artisan serve to run the web server
9. Use http://127.0.0.1:8000 to access the website..

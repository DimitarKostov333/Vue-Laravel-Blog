# Laravel Test
<br />
The code checks whether you already have a profile in the database and if you do it automatically fills in your name and email.
<br />
<br />

Installation:<br />

1) Fork the project:<br />
   git clone https://github.com/DimitarKostov333/test_blog.git laravelTest
2) Navigate to the project directory:<br />
   cd laravelTest
3) Rename .env.example to .env (Do not add your mysql credentials to the .env file, add them to config/database file.)
4) Run the composer install command in terminal.
5) Generate a key:<br/>
   php artisan key:generate
6) Run all the migrations (create all the tables):<br/>
   php artisan migrate
7) Seed the database (add fake data to the db):<br/>
   php artisan db:seed
8) Install node dependencies:<br/>
    npm install
9) Compile all the assets (compile all the views):<br/>
    npm run dev
10) You can now run the application:<br/>
    php artisan serve.

   



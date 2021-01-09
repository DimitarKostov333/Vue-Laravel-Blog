# Laravel Test Blog
A blog project created with Laravel 6 (LTS)
<br />
<br />

Please note, this app uses sqlite to persist data, please ensure you have sqlite3 enabled in your php.ini file.
<br />
<br />

Installation:

1) Fork the project:<br />
   git clone https://github.com/DimitarKostov333/test_blog.git laravelTestBlog
2) Navigate to the project directory:<br />
   cd laravelTestBlog
3) Rename .env.example to .env
4) Open the .env file and remove all the variables starting with DB_ then just add the following variable:<br />
   DB_CONNECTION=sqlite
5) Navigate to the database folder and create a file - "database.sqlite"
6) Run the composer install command in terminal.
7) Generate a key:<br/>
   php artisan key:generate
8) Run all the migrations:<br/>
   php artisan migrate
9) Seed the database:<br/>
   php artisan db:seed
10) Install node modules:<br/>
    npm install
11) Compile all the assets:<br/>
    npm run dev
   
12) You can now run the application:<br/>
    php artisan serve.
   
13) To login please use the following test user credentials:<br/>
    Username: Test User
    Password: password
   



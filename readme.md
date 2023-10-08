HOW TO RUN APPLICAITON 
    YOUR APP FOLDER MUST BE `gwsc`
    OPEN TERMINAL AND WRITE `cd ..`
    write ` php -S localhost:8000 `
congrats you can access application though localhost:8000/gwsc/login.php

Connect database ` database/MySql.php `
    change your password and your database name.

IF YOU WANNA RUN THROUGH ` localhost ` link ,
    if you use laragon ,
        place gwsc folder under ` www/ ` folder
        and call the `localhost/gwsc`
        change the `$base` variable in `helpers/HTTP.php` to `localhost/gwsc`
    if you use xampp ,
        place gwsc folder under ` htdocs/ ` folder
        and call the `localhost/gwsc`
        change the `$base` variable in `helpers/HTTP.php` to `localhost/gwsc`
congrats you can run application with apache server.

The SQL Queries are under the `database/model` folder.
Under this folder you see many files each file contains class.
each class contains functions.
each function contains query to run.
if you wanna get query for database , please copy those.
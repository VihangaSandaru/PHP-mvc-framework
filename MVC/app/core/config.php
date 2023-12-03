<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){

    /** database config **/
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define('ROOT', 'http://localhost/MVC/public');
}
else{
     /** database config **/
     define('DBNAME', 'my_db');
     define('DBHOST', 'localhost');
     define('DBUSER', 'root');
     define('DBPASS', '');
     define('DBDRIVER', '');

    define('ROOT', 'http://www.yourwebsite.com');
}

define('APP_NAME', "My Website");
define('APP_DESC', "Best Website On the Planet");

/** true means show errors **/
define('DEBUG', true);  // methana true tynakota mokakhri error ekak awma web page eke error eka pennanawa normal widiyata. Meka false dala tibbama pweb page eka error eka penanne na page eka lode wenne na
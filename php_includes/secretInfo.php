<?php

/* SERVER SPECIFIC VARS
----------------------------------------------------*/
    /*** LOCAL ***/
    if (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false) {
        define('USERNAME', 'root');
        define('PASSWORD', '120!Skipper');
    /*** STAGE ***/
    } else if (strpos($_SERVER['SERVER_NAME'], 'lanterntravels.com') !== false) {
        define('USERNAME', 'root');
        define('PASSWORD', 'JTYpsJhRNIH5');
    /*** PRODUCTION ***/
    } else {
        define('USERNAME', 'root');
        define('PASSWORD', 'donknowyet');
    }
 
/* SERVER INDEPENDENT VARS
----------------------------------------------------*/
    define('SERVERNAME', 'localhost');
    define('DBNAME', 'lanternguide_dbase');

?>
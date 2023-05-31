<?php

if (!file_exists(__DIR__ .'/config.php')) {
    die( 'ERROR NO EXISTE CONFIG.PHP');
} else {
    session_start();
    
    require('config.php');
    setlocale( LC_TIME,  SITE_LANG); 
    date_default_timezone_set( SITE_TIMEZONE);
    
            require('includes/class-db.php');
            require('includes/posts.php');
            require('includes/helpers.php');   

            
            $bbdd = new DB( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT );

            if( isset($_GET['logout']) ){
                loggout();
            }

}

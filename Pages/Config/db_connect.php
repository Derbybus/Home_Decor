<?php
    
    define('DB_HOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','ecommerce');


    //Connect to database
    $connect = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    
    if(!$connect->error)
    {
        // echo 'connected';
    }
    else{
        
        die('Connection Failed');
    }





?>

<?php

    session_start();
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Credentials: true");
    
    date_default_timezone_set("Asia/Manila");
    
    $db = mysqli_connect("localhost", "root","","bsit_db");

    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } 
    
    //  date_default_timezone_set("Asia/Singapore");


?>
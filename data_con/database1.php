<?php 
    
    //session_start();
    
    //Create Constants to Store Non Repeating Values
    // define('SITEURL', 'http://localhost/Doctor-appointment/');
    // define('LOCALHOST', 'localhost');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_NAME', '');
    
    //database connection
    $con = mysqli_connect('localhost', 'root', '') or die(mysqli_error()); 
    //selecting database
    $db_select = mysqli_select_db($con, 'doctor-appointment') or die(mysqli_error());

?>
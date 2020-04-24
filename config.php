<?php

    $db_server = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'filo_system';
    
    $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
    
    if($conn === false){
        die("ERROR: Could not connect to database. " . mysqli_connect_error());
    }

?>
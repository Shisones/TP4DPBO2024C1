<?php 
    ini_set('display_errors', 1);
    error_reporting(~0);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "tp_mvc";
    $conn = new mysqli($servername, $username, $password, $db_name);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    
?>
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "NEWDB";


    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
       echo "Connection failed!";
    }
?>
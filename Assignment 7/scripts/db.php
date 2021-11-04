<?php 
    $servername = "localhost";
    $username = "group17";
    $password = "IINsT1";
    $dbname = "group17";


    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
       echo "Connection failed!";
    }
?>
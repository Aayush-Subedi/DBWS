<?php 
    $servername = "localhost";
    $dbname = "group17";


    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
       echo "Connection failed!". "<br>";
       echo $conn->connect_error;
    }
?>
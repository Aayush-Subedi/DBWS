<?php 
     $servername = "localhost";
     $username = "group17";
     $password = "IINsT1";
     $dbname = "group17";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);

     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }


     $sql = "SELECT * FROM Rentee";
     
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo json_encode($row);
        }
     }
     else {
         echo "Error: " .$sql . "<br>". $conn->error;
     }
     $conn->close();
?>
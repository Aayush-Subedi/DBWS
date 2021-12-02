<?php


$username = "group17";
$password = "IINsT1";
include("./db.php");

$search = $_POST['search'];

$sql = "SELECT * FROM Item WHERE name LIKE CONCAT('$search' , '%')";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    }
} else if ($conn->error) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

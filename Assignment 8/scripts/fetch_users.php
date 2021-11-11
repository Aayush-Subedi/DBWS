<?php
$username = $_POST['username'];
$password = $_POST['password'];
include("./db.php");

$sql = "SELECT * FROM Users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    }
} else if ($conn->error) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

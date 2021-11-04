<?php
include('./db.php');

$sql = "SELECT * FROM Users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
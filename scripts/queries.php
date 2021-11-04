<?php

include("./db.php");

$rating_q = 'average_rating >=';
$price_q = 'price <=';
$search_q = 'name';

$rating = isset($_POST['rating']) ? $_POST['rating'] : (1) && ($rating_q = '1 =');
$price = (isset($_POST['price']) && $_POST['price'] != '') ? $_POST['price'] : (1) && ($price_q = '1 =');
$search = (isset($_POST['search']) && $_POST['search'] != '') ? $_POST['search'] : (1) && ($search_q = '1');

if ($_POST['type'] == 'items-part') {
    $sql = "SELECT name, category, price, average_rating FROM Item WHERE $search_q = '$search' AND $price_q  '$price' AND $rating_q '$rating'";
} else if ($_POST['type'] == 'items-full') {
    $rating_q = 'trim(average_rating) =';
    $price_q = 'trim(price) =';
    $sql = "SELECT * FROM Item WHERE $search_q = '$search' AND $price_q  '$price' AND $rating_q '$rating'";
}

else if ($_POST['type'] == 'users-part') {
    $name_q = 'fname';
    $name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : (1) && ($name_q = '1');
    $sql = "SELECT user_id, fname, lname, email FROM Users WHERE $name_q = '$name'";
    echo $sql;
}

else if ($_POST['type'] == 'users-full') {
    $user_id = $_POST['user_id'];
    $sql = "SELECT Users.user_id, Users.fname, Rented_item.rent_id, Rented_item.duration_start, Rented_item.duration_end FROM Rented_item INNER JOIN Users ON Users.user_id = Rented_item.rentee_id AND Users.user_id = '$user_id' ";
    echo $sql;
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    }
} else {
    echo "";
}

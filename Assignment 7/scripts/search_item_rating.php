<?php

include("./db.php");

$rating_min_q = 'average_rating >=';
$rating_max_q = 'average_rating <=';
$search_q = 'name';

$rating_min = isset($_POST['rating_min']) ? $_POST['rating_min'] : (1) && ($rating_min_q = '1 =');
$rating_max = isset($_POST['rating_max']) ? $_POST['rating_max'] : (1) && ($rating_max_q = '1 =');
$search = (isset($_POST['search']) && $_POST['search'] != '') ? $_POST['search'] : (1) && ($search_q = '1');

if ($_POST['type'] == 'items-part') {
    $sql = "SELECT name, category, price, average_rating FROM Item WHERE $search_q = '$search' AND $rating_min_q '$rating_min' AND $rating_max_q '$rating_max'";
} else if ($_POST['type'] == 'items-full') {
    $rating_min_q = 'trim(average_rating) =';
    $rating_max_q = 'trim(average_rating) =';
    $price_q = 'trim(price) =';
    $sql = "SELECT * FROM Item WHERE $search_q = '$search' AND $rating_min_q '$rating_min' AND $rating_max_q '$rating_max'";
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

<head>
    <link rel="stylesheet" href="../css/input.css" />
</head>


<div class="result">
    <?php
    include("../components/header.php");
    include("./db.php");

    if ($_POST['submit'] == 'admin') {
        $title = mysqli_real_escape_string($conn, $_REQUEST['title']);
        $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
        $sql = "INSERT into Admin (title, user_id) VALUES ('$title',  '$user_id')";


        if ($conn->query($sql) === TRUE) {
            echo "Record with title $title and user_id $user_id added successfully" . "<br>";
            echo "<a class='btn btn-primary' href='../pages/admin_input.php'>Back</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    if ($_POST['submit'] == 'item') {
        $renter_id = mysqli_real_escape_string($conn, $_REQUEST['renter_id']);
        $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
        $category = mysqli_real_escape_string($conn, $_REQUEST['category']);
        $condition = mysqli_real_escape_string($conn, $_REQUEST['condition']);
        $rating = mysqli_real_escape_string($conn, $_REQUEST['rating']);
        $price = mysqli_real_escape_string($conn, $_REQUEST['price']);
        $times_rented = mysqli_real_escape_string($conn, $_REQUEST['times_rented']);


        $sql = "INSERT into Item (renter_id, name, category, item_condition, average_rating, price, times_rented) VALUES ('$renter_id',  '$name', '$category', '$condition', '$rating', '$price', '$times_rented' )";


        if ($conn->query($sql) === TRUE) {
            echo "Record with added successfully" . "<br>";
            echo "<a class='btn btn-primary' href='../pages/item_input.php'>Back</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    if ($_POST['submit'] == 'rating') {
        $rentee_id = mysqli_real_escape_string($conn, $_REQUEST['rentee_id']);
        $renter_id = mysqli_real_escape_string($conn, $_REQUEST['renter_id']);
        $rating = mysqli_real_escape_string($conn, $_REQUEST['rating']);
        $input_date = $_REQUEST['timestamp'];
        $timestamp = date("Y-m-d H:i:s", strtotime($input_date));
        $sql = "INSERT into Rating (rentee_id, renter_id, rating, timestamp) VALUES ('$rentee_id', '$renter_id', '$rating', '$timestamp')";


        if ($conn->query($sql) === TRUE) {
            echo "Record added successfully" . "<br>";
            echo "<a class='btn btn-primary' href='../pages/rating_input.php'>Back</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    if ($_POST['submit'] == 'rented_item') {
        $rentee_id = mysqli_real_escape_string($conn, $_REQUEST['rentee_id']);
        $item_id = mysqli_real_escape_string($conn, $_REQUEST['item_id']);
        $input_start_date = $_REQUEST['duration_start'];
        $input_end_date = $_REQUEST['duration_end'];

        $duration_start = date("Y-m-d H:i:s", strtotime($input_start_date));
        $duration_end = date("Y-m-d H:i:s", strtotime($input_end_date));

        $sql = "INSERT into Rented_item (rentee_id, item_id, duration_start, duration_end) VALUES ('$rentee_id', '$item_id', '$duration_start', '$duration_end')";


        if ($conn->query($sql) === TRUE) {
            echo "Record added successfully" . "<br>";
            echo "<a class='btn btn-primary' href='../pages/rented_item_input.php'>Back</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    if ($_POST['submit'] == 'rentee') {
        $phone_no = mysqli_real_escape_string($conn, $_REQUEST['phone_no']);
        $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
        $dob = date("Y-m-d H:i:s", strtotime(mysqli_real_escape_string($conn, $_REQUEST['dob'])));

        $sql = "INSERT into Renter (phone_no, address, date_of_birth) VALUES ('$phone_no',  '$address', '$dob')";


        if ($conn->query($sql) === TRUE) {
            echo "Record with added successfully" . "<br>";
            echo "<a class='btn btn-primary' href='../pages/rentee_input.php'>Back</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    if ($_POST['submit'] == 'renter') {
        $phone_no = mysqli_real_escape_string($conn, $_REQUEST['phone_no']);
        $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
        $dob = date("Y-m-d H:i:s", strtotime(mysqli_real_escape_string($conn, $_REQUEST['dob'])));
        $rating = mysqli_real_escape_string($conn, $_REQUEST['average_rate']);

        $sql = "INSERT into Renter (phone_no, address, date_of_birth, average_rate) VALUES ('$phone_no',  '$address', '$dob', '$rating')";


        if ($conn->query($sql) === TRUE) {
            echo "Record with added successfully" . "<br>";
            echo "<a class='btn btn-primary' href='../pages/renter_input.php'>Back</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    if ($_POST['submit'] == 'review_and_rating') {
        $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
        $item_id = mysqli_real_escape_string($conn, $_REQUEST['item_id']);
        $rating = mysqli_real_escape_string($conn, $_REQUEST['rating']);
        $review = mysqli_real_escape_string($conn, $_REQUEST['review']);
        $sql = "INSERT into Review_and_rating (user_id, item_id, rating, review) VALUES ('$user_id', '$item_id', '$rating', '$review')";

        if ($conn->query($sql) === TRUE) {
            echo "Record added successfully" . "<br>";
            echo "<a class='btn btn-primary' href='../pages/user_input.php'>Back</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    if ($_POST['submit'] == 'user') {
        $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
        $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
        $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
        $sql = "INSERT into Users (fname, lname, email) VALUES ('$fname',  '$lname', '$email')";


        if ($conn->query($sql) === TRUE) {
            echo "Record with name $fname added successfully" . "<br>";
            echo "<a class='btn btn-primary' href='../pages/user_input.php'>Back</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    include("../components/footer.php"); ?>
</div>
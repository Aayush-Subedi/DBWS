

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome For Icon -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
      integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Linking CSS File -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" />
    <title>My E-Commerce</title>
  </head>
  <body>
    <!-- ============== Navbar starts here ================= -->
	<div id="navbar">
      <div>
        <a href="../index.html">
        <img
          width="200"
          height="150"
          src="../logo.png"
        />
      </a>
      </div>
      <div class="dropdown">
        <button>Categories</button>
        <div class="dropdown-content">
        <a href="#">lorem</a>
        <a href="#">lorem</a>
        <a href="#">lorem</a>
        </div>
      </div>
      <div class="dropdown">
        <button>Best Sellers</button>
        <div class="dropdown-content">
        <a href="#"">lorem</a>
        <a href="#">lorem</a>
        <a href="#">lorem</a>
        </div>
      </div>
      <div>
        <form action="">
          <input type="search" placeholder="Search" id="search-bar" />
        </form>
      </div>
      <div>
        <a href="../pages/maintainance.html">maintainance</a>
      </div>
      <div id="cart-login">
        <a href="" class="navbar-icons"><i class="fas fa-2x fa-cart-plus"></i></a>
        <a href="" class="navbar-icons"><i class="fas fa-2x fa-user"></i></a>
      </div>
    </div>
    <!-- ============== Main Content Starts ================ -->
      
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

            $rentee_id = mysqli_real_escape_string($conn, $_REQUEST['rentee_id']);
            $item_id = mysqli_real_escape_string($conn, $_REQUEST['item_id']);
            $input_start_date = $_REQUEST['duration_start'];
            $input_end_date = $_REQUEST['duration_end'];

            $duration_start = date("Y-m-d H:i:s",strtotime($input_start_date));
            $duration_end = date("Y-m-d H:i:s",strtotime($input_end_date));
            
            $sql = "INSERT into Rented_item (rentee_id, item_id, duration_start, duration_end) VALUES ('$rentee_id', '$item_id', '$duration_start', '$duration_end')";
            
            
            if ($conn->query($sql) === TRUE) {
                echo "Record added successfully" . "<br>";
                echo "<a class='btn btn-primary' href='../pages/rented_item_input.html'>Back</a>";

            }
            else {
                echo "Error: " .$sql . "<br>". $conn->error;
            }
            $conn->close();
        ?>
    <!-- ============== Main Content Ends ================ -->
    <!-- ========= Footer Starts Here ========= -->
    <footer id="footer">
      <div>Contact Us</div>
      <div><span>&copy;</span>Copyright 2021</div>
      <div><a href="disclaimer.html" id="dis">Disclaimer</a></div>
      <div id="social-media">
        <i class="fab icons fa-2x fa-facebook"></i>
        <i class="fab icons fa-2x fa-instagram"></i>
        <i class="fab icons fa-2x fa-twitch"></i>
        <i class="fab icons fa-2x fa-twitter"></i>
      </div>
    </footer>
    <!-- =========== Footer  Ends Here ============ -->
    <script src="./index.js"></script>
  </body>
</html>

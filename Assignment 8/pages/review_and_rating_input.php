<head>
  <link rel="stylesheet" href="../css/input.css" />
</head>
<?php include("../components/header.php") ?>

<!-- ============== Main Content Starts ================ -->
<form action="../scripts/inserter.php" method="post" class="form">
  <?php include("../components/user_connect.php") ?>
  <div class="form-group row">
    <label for="user_id" class="col-sm-2 col-form-label">User Id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="user_id" placeholder="000" required min="0">
    </div>
  </div>
  <div class="form-group row">
    <label for="item_id" class="col-sm-2 col-form-label">Item Id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="item_id" placeholder="000" required min="0">
    </div>
  </div>
  <div class="form-group row">
    <label for="rating" class="col-sm-2 col-form-label">Rating</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="rating" placeholder="000" min="0" max="5" value="0">
    </div>
  </div>
  <div class="form-group row">
    <label for="review" class="col-sm-2 col-form-label">Review</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="review" placeholder="review" maxlength="500">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <p id="table" class="hide"></p>
      <button type="button" class="btn btn-primary" id="find" onclick="getData('user')">Find Users</button>
      <button type="button" class="btn btn-primary" id="find" onclick="getData('item')">Find Items</button>
      <button type="button" class="btn btn-primary hide" id="hide" onclick="h()">Hide</button>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button name="submit" type="submit" class="btn btn-primary" value="review_and_rating">Submit</button>
    </div>
  </div>
</form>

<!-- ============== Main Content Ends ================ -->
<!-- ========= Footer Starts Here ========= -->
<?php include("../components/footer.php") ?>

<!-- =========== Footer  Ends Here ============ -->
<script src="./index.js"></script>
<script type="text/javascript">
  var html;

  function table(data) {
    var t = document.getElementById("table");
    var b = document.getElementById("hide");
    t.style.display = "block";
    b.style.display = "inline";

    var list = data.split("{");
    var users = [];


    for (var i in list) {
      list[i] = list[i].slice(0, -1);
    }

    for (var i in list) {
      users.push(list[i].split(","));
    }
    console.log(users);
    for (var i in users) {
      for (var j in users[i]) {
        var text = users[i][j].split(":")[1];
        if (text) {
          html += "<td>" + users[i][j].split(":")[1].replace("\"", '').slice(0, -1) + "</td>";
        }
      }
      html += "</tr><tr>"
    }

    html += "</tr></table>"

    t.innerHTML = html;
  }

  function h() {
    var t = document.getElementById("table");
    var b = document.getElementById("hide");
    t.style.display = "none";
    b.style.display = "none";
  }

  function getData(type) {

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username === '' || password === '') {
      alert("please enter username and password");
      return;
    }

    if (type === 'user') {
      $.ajax({
        type: "post",
        url: "../scripts/fetch_users.php",
        data: {
          'username': username,
          'password': password
        },
        success: function(data) {
          table(data);
        }
      })
      html =
        "<table class='table table-striped' id='table'><tr><th>user_id</th><th>fname</th><th>lname</th><th>email</th></tr><tr>"
    } else {
      $.ajax({
        type: "post",
        url: "../scripts/fetch_items.php",
        data: {
          'username': username,
          'password': password
        },
        success: function(data) {
          table(data);
        }
      })
      html =
        "<table class='table table-striped' id='table'><tr><th>item_id</th><th>renter_id</th><th>Name</th><th>Category</th><th>Description</th><th>Rating</th><th>Price</th><th>Times rented</th></tr><tr>"
    }

  }
</script>
</body>
<head>
  <link rel="stylesheet" href="../css/input.css" />
</head>
<?php include("../components/header.php") ?>

<!-- ============== Main Content Starts ================ -->

<form action="../scripts/inserter.php" method="post" class="form">
  <?php include("../components/user_connect.php") ?>
  <div class="form-group row">
    <label for="rentee_id" class="col-sm-2 col-form-label">Rentee Id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="rentee_id" placeholder="000" required min="0">
    </div>
  </div>
  <div class="form-group row">
    <label for="renter_id" class="col-sm-2 col-form-label">Renter Id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="renter_id" placeholder="000" required min="0">
    </div>
  </div>
  <div class="form-group row">
    <label for="rating" class="col-sm-2 col-form-label">Rating</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="rating" placeholder="2.5" min="0" max="5">
    </div>
  </div>
  <div class="form-group row">
    <label for="timestamp" class="col-sm-2 col-form-label">Timestamp</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="timestamp">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <p id="table" class="hide"></p>
      <button type="button" class="btn btn-primary" id="find" onclick="getData('renter')">Find Renters</button>
      <button type="button" class="btn btn-primary" id="find" onclick="getData('rentee')">Find Rentees</button>
      <button type="button" class="btn btn-primary hide" id="hide" onclick="h()">Hide</button>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button name="submit" type="submit" class="btn btn-primary" value="rating">Submit</button>
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

    console.log(username);
    console.log(password);

    if (type === 'renter') {
      $.ajax({
        type: "post",
        url: "../scripts/fetch_renters.php",
        data: {
          'username': username,
          'password': password
        },
        success: function(data) {
          table(data);
        }
      })
      html =
        "<table class='table table-striped' id='table'><tr><th>Renter_id</th><th>phone_no</th><th>address</th><th>date of birth</th><th>average rating</th></tr><tr>"
    } else {
      $.ajax({
        type: "post",
        url: "../scripts/fetch_rentees.php",
        data: {
          'username': username,
          'password': password
        },
        success: function(data) {
          table(data);
        }
      })
      html =
        "<table class='table table-striped' id='table'><tr><th>Rentee_id</th><th>phone_no</th><th>address</th><th>date of birth</th></tr><tr>"
    }

  }
</script>
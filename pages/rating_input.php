<head>
  <link rel="stylesheet" href="../css/input.css"/>
</head>
<?php include("../components/header.php") ?>

<!-- ============== Main Content Starts ================ -->

<form action="../scripts/inserter.php" method="post" class="form">
  <div class="form-group row">
    <label for="rentee_id" class="col-sm-2 col-form-label">rentee_id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="rentee_id" placeholder="rentee_id">
    </div>
  </div>
  <div class="form-group row">
    <label for="renter_id" class="col-sm-2 col-form-label">renter_id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="renter_id" placeholder="renter_id">
    </div>
  </div>
  <div class="form-group row">
    <label for="rating" class="col-sm-2 col-form-label">rating</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="rating" placeholder="rating">
    </div>
  </div>
  <div class="form-group row">
    <label for="timestamp" class="col-sm-2 col-form-label">timestamp</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="timestamp">
    </div>
  </div>
  <div class="form-group row">
    <label for="user_id" class="col-sm-2 col-form-label">user_id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="user_id" placeholder="user_id">
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
    if (type === 'renter') {
      $.ajax({
        url: "../scripts/fetch_renters.php",
        success: function(data) {
          table(data);
        }
      })
      html =
        "<table class='table' id='table'><tr><th>Renter_id</th><th>phone_no</th><th>address</th><th>date of birth</th><th>average rating</th></tr><tr>"
    } else {
      $.ajax({
        url: "../scripts/fetch_rentees.php",
        success: function(data) {
          table(data);
        }
      })
      html =
        "<table class='table' id='table'><tr><th>Rentee_id</th><th>phone_no</th><th>address</th><th>date of birth</th></tr><tr>"
    }

  }
</script>
<head>
  <link rel="stylesheet" href="../css/input.css"/>
</head>
<?php include("../components/header.php") ?>

<!-- ============== Main Content Starts ================ -->

<form action="../scripts/inserter.php" method="post" class="form">
    <div class="form-group row">
        <label for="phone_no" class="col-sm-2 col-form-label">phone_no</label>
        <div class="col-sm-10">
            <input type="tel" class="form-control" name="phone_no" placeholder="phone_no">
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" placeholder="address">
        </div>
    </div>
    <div class="form-group row">
        <label for="dob" class="col-sm-2 col-form-label">dob</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="dob" placeholder="dob">
        </div>
    </div>
    <div class="form-group row">
        <label for="user_id" class="col-sm-2 col-form-label">user_id</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="user_id" placeholder="user_id">
            <p id="table" class="hide"></p>
            <button type="button" class="btn btn-primary" id="find" onclick="getData()">Find Users</button>
            <button type="button" class="btn btn-primary hide" id="hide" onclick="h()">Hide</button>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button name="submit" type="submit" class="btn btn-primary" value="rentee">Submit</button>
        </div>
    </div>

    </div>
</form>

<!-- ============== Main Content Ends ================ -->
<!-- ========= Footer Starts Here ========= -->
<?php include("../components/footer.php") ?>

<!-- =========== Footer  Ends Here ============ -->
<script src="./index.js"></script>
<script type="text/javascript">
    function table(data) {
        var t = document.getElementById("table");
        var b = document.getElementById("hide");
        t.style.display = "block";
        b.style.display = "inline";

        var list = data.split("{");
        var users = [];
        var html = "<table class='table' id='table'><tr><th>user_id</th><th>fname</th><th>lname</th><th>email</th></tr><tr>"

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

    function getData() {
        console.log("clicked");
        $.ajax({
            url: "../scripts/fetch_users.php",
            success: function(data) {
                table(data);
            }
        })

    }
</script>
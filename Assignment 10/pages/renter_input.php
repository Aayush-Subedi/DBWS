<head>
    <link rel="stylesheet" href="../css/input.css" />
</head>
<?php include("../components/header.php") ?>

<!-- ============== Main Content Starts ================ -->

<form action="../scripts/inserter.php" method="post" class="form">
    <?php include("../components/user_connect.php") ?>
    <div class="form-group row">
        <label for="phone_no" class="col-sm-2 col-form-label">Phone No</label>
        <div class="col-sm-10">
            <input type="tel" class="form-control" name="phone_no" placeholder="+49 111 111 111" maxlength="15">
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" placeholder="Campus Ring 1" maxlength="30">
        </div>
    </div>
    <div class="form-group row">
        <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="dob">
        </div>
    </div>
    <div class="form-group row">
        <label for="average_rate" class="col-sm-2 col-form-label">Average Rating</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="average_rate" placeholder="2.5" min="0" max="5" required value="0">
        </div>
    </div>
    <div class="form-group row">
        <label for="user_id" class="col-sm-2 col-form-label">User Id</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="user_id" placeholder="000" required min="0">
            <p id="table" class="hide"></p>
            <button type="button" class="btn btn-primary" id="find" onclick="getData()">Find Users</button>
            <button type="button" class="btn btn-primary hide" id="hide" onclick="h()">Hide</button>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button name="submit" type="submit" class="btn btn-primary" value="renter">Submit</button>
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
        var html =
            "<table class='table table-striped' id='table'><tr><th>user_id</th><th>fname</th><th>lname</th><th>email</th></tr><tr>"

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
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if (username === '' || password === '') {
            alert("please enter username and password");
            return;
        }

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

    }
</script>
</body>
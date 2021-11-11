<?php include("../components/header.php") ?>

<head>
    <link rel="stylesheet" href="../css/query.css" />
</head>


<form>
    <?php include("../components/user_connect.php") ?>

    <div class="input-group row user_search">
        <input type="search" class="form-control rounded col-11" placeholder="Enter person name" aria-label="Search" aria-describedby="search-addon" name="search" id="search" />
        <button type="button" class="btn btn-outline-primary col-1" onclick="getData()">search</button>
    </div>
    <div class="user_search" id="table">

    </div>
</form>

<?php include("../components/footer.php") ?>
<script src="https://cdn.jsdelivr.net/gh/mgalante/jquery.redirect@master/jquery.redirect.js" ></script>
<script type="text/javascript">
    function check(e) {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if (username === '' || password === '') {
            alert("please enter username and password");
            return;
        }

        let data = e.target.parentNode.innerHTML.split('<td>');
        data.shift()
        for (i in data) {
            data[i] = data[i].substring(0, data[i].length - 5);
        }

        $.redirect('./single_result_user.php', {
            user_id: data[0],
            username: username,
            password: password 
        },
            "POST"
        )   
    }

    function table(data) {
        console.log(data);
        var t = document.getElementById("table");
        t.style.display = "block";

        var list = data.split("{");
        var users = [];
        var html = "<table class='table table-striped' id='table'><tr><th>User Id</th><th>First Name</th><th>Last Name</th><th>email</th></tr><tr id='row' onclick='check(event)'>"

        for (var i in list) {
            list[i] = list[i].slice(0, -1);
        }

        for (var i in list) {
            users.push(list[i].split(","));
        }
        for (var i in users) {
            for (var j in users[i]) {
                var text = users[i][j].split(":")[1];
                if (text) {
                    html += "<td>" + users[i][j].split(":")[1].replace("\"", '').slice(0, -1) + "</td>";
                }
            }
            html += "</tr><tr id='row' onclick='check(event)'>"
        }

        html += "</tr></table>"

        t.innerHTML = html;
    }

    function getData() {
        var name = document.getElementById('search').value;
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if (username === '' || password === '') {
            alert("please enter username and password");
            return;
        }

        $.ajax({
            type: "post",
            url: "../scripts/queries.php",
            data: {
                'name': name,
                'username': username,
                'password': password,
                'type': 'users-part'
            },
            success: function(data) {
                table(data);
            }
        })

    }
</script>
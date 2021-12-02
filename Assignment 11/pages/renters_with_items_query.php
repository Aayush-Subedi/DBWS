<head>
    <link rel="stylesheet" href="../css/query.css" />
    <link rel="stylesheet" href="../css/input.css" />
</head>

<?php include("../components/header.php") ?>

<form>
    <?php include("../components/user_connect.php") ?>
    <div class="container">
        <div class="input-group row">
            <input type="search" class="form-control rounded col-11" placeholder="Renter name" aria-label="Search" aria-describedby="search-addon" name="search" id="search" />
            <button type="button" class="btn btn-outline-primary col-1" onclick="getData()">search</button>
        </div>
    </div>
    <div class="result">
        <div id="table">

        </div>
    </div>
</form>


<?php include("../components/footer.php") ?>
<script src="https://cdn.jsdelivr.net/gh/mgalante/jquery.redirect@master/jquery.redirect.js"></script>
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
        
        $.redirect('./single_result_renter.php', {
                'user_id': data[0],
                'username': username,
                'password': password
            },
            "post"
        )
    }

    function table(data) {
        console.log(data);
        var t = document.getElementById("table");

        var list = data.split("{");
        var users = [];
        var html = "<table class='table table-striped' id='table'><tr><th>Renter Id</th><th>First Name</th><th>Last Name</th><th>Email</th></tr><tr id='row' onclick='check(event)'>"

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
        var search = document.getElementById('search').value;
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
                'fname': search,
                'username': username,
                'password': password,
                'type': 'renters-part'
            },
            success: function(data) {
                table(data);
            }
        })

    }
    $('#search').autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "post",
                url: "../scripts/queries.php",
                data: {
                    'search': request.term,
                    'username': document.getElementById('username').value,
                    'password': document.getElementById('password').value,
                    'type': 'users-auto'
                },
                success: function(data) {
                    if (data) {
                        console.log(username);
                        data = data.slice(1, -1);
                        var list = data.split("{");

                        var vals = []
                        for (var i in list) {
                            list[i] = list[i].slice(0, -1);

                        }

                        for (var i in list) {
                            vals.push(list[i].split(":")[1]);
                        }

                        for (var i in vals) {
                            if (vals[i].charAt(0) === '"')
                                vals[i] = vals[i].substring(1);
                            if (vals[i].charAt(vals[i].length - 1) === '"')
                                vals[i] = vals[i].substring(0, vals[i].length - 1);
                        }

                        response(vals)
                    }
                }
            })
        }
    })
</script>
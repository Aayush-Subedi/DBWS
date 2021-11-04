<head>
    <link rel="stylesheet" href="../css/input.css" />
</head>

<?php include("../components/header.php") ?>



<form>
    <div class="container">
        <div class="input-group row">
            <input type="search" class="form-control rounded col-11" placeholder="Item Name or Category" aria-label="Search" aria-describedby="search-addon" name="search" id="search" />
            <button type="button" class="btn btn-outline-primary col-1" onclick="getData()">search</button>
        </div>
    </div>
    <div class="result">
        <div id="table">

        </div>
    </div>
</form>


<?php include("../components/footer.php") ?>

<?php include("../components/footer.php") ?>

<script type="text/javascript">
    function check(e) {
        let data = e.target.parentNode.innerHTML.split('<td>');
        data.shift()
        for (i in data) {
            data[i] = data[i].substring(0, data[i].length - 5);
        }

        window.location.href = 'single_result_renter.php?dist=' + data[0];
    }

    function table(data) {
        console.log(data);
        var t = document.getElementById("table");

        var list = data.split("{");
        var users = [];
        var html = "<table class='table' id='table'><tr><th>Renter Id</th><th>First Name</th><th>Last Name</th><th>Email</th></tr><tr id='row' onclick='check(event)'>"

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

        $.ajax({
            type: "post",
            url: "../scripts/queries.php",
            data: {
                'fname': search,
                'type': 'renters-part'
            },
            success: function(data) {
                table(data);
            }
        })

    }
    $(':radio').change(function() {
        rating = this.value;
    });
</script>
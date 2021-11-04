<?php include("../components/header.php") ?>

<link rel="stylesheet" href="../css/query.css" />
<form class="form container">
    <div class="row">
        <div class="filters col-3">
            <form>
                <div class="form-group row">
                    <label for="rating_item_min" class="col-sm-2 col-form-label">From</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="rating_item_min" id="rating_item_min">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rating_item_max" class="col-sm-2 col-form-label">To</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="rating_item_max" id="rating_item_max">
                    </div>
                </div>
            </form>
        </div>
        <div class="input-group rounded col-9">
            <div class="container">
                <div class="input-group row">
                    <input type="search" class="form-control rounded col-11" placeholder="Item Name" aria-label="Search" aria-describedby="search-addon" name="search" id="search" />
                    <button type="button" class="btn btn-outline-primary col-1" onclick="getData()">search</button>
                </div>
            </div>
            <div class="result">
                <div id="table">

                </div>
            </div>
        </div>
    </div>
</form>

<?php include("../components/footer.php") ?>

<script type="text/javascript">
    function check(e) {
        let data = e.target.parentNode.innerHTML.split('<td>');
        data.shift()
        for (i in data) {
            data[i] = data[i].substring(0, data[i].length - 5);
        }

        window.location.href = 'single_result.php?dist=' + data[0] + '|' + data[1] + '|' + data[2] + '|' + data[3];
    }

    function table(data) {
        console.log(data);
        var t = document.getElementById("table");
        t.style.display = "block";

        var list = data.split("{");
        var users = [];
        var html = "<table class='table' id='table'><tr><th>name</th><th>category</th><th>price</th><th>average_rating</th></tr><tr id='row' onclick='check(event)'>"

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

    function h() {
        var t = document.getElementById("table");
        var b = document.getElementById("hide");
        t.style.display = "none";
        b.style.display = "none";
    }
    var rating;

    function getData() {
        var rating_min = document.getElementById('rating_item_min').value;
        var rating_max = document.getElementById('rating_item_max').value;
        var search = document.getElementById('search').value;

        console.log(rating);
        console.log(rating_min);
        console.log(rating_max);
        console.log(search);

        $.ajax({
            type: "post",
            url: "../scripts/search_item_rating.php",
            data: {
                'rating_min': rating_min,
                'rating_max': rating_max,
                'search': search,
                'type': 'items-part'
            },
            success: function(data) {
                table(data);
            }
        })

    }
</script>
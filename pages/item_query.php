<head>
  <link rel="stylesheet" href="../css/query.css"/>
</head>
<?php include("../components/header.php") ?>

<form class="form container">
    <div class="row">
        <div class="filters col-3">
            <form>
            <span>Rating Above:</span>
                <div class="rating">
                    <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
                    <label for="star5">☆</label>
                    <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
                    <label for="star4">☆</label>
                    <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
                    <label for="star3">☆</label>
                    <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
                    <label for="star2">☆</label>
                    <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
                    <label for="star1">☆</label>
                    <div class="clear"></div>
                </div>
            </form>
            <label>Price Below:</label>
            <input type="number" name="price" id="price" />
        </div>
        <div class="input-group rounded col-9">
            <div class="container">
                <div class="input-group row">
                    <input type="search" class="form-control rounded col-11" placeholder="Item Name or Category" aria-label="Search" aria-describedby="search-addon" name="search" id="search" />
                    <button type="button" class="btn btn-outline-primary col-1" onclick="getData()">search</button>
                </div>
            </div>
            <div class="result">
                <div id="table" >

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
        for (i in data ) {
            data[i] = data[i].substring(0, data[i].length - 5);
        }

        window.location.href = 'single_result.php?dist='+data[0]+ '|' + data[1]+ '|' +data[2]+ '|' +data[3];
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
        var price = document.getElementById('price').value;
        var search = document.getElementById('search').value;

        $(':radio').change(function() {
            rating = this.value;
        });

        console.log(rating);
        console.log(price);
        console.log(search);

        $.ajax({
            type: "post",
            url: "../scripts/queries.php",
            data: {
                'rating': rating,
                'price': price,
                'search': search,
                'type': 'items-part'
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
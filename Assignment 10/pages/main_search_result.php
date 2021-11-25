<head>
  <link rel="stylesheet" href="../css/query.css"/>
</head>

<?php include('../components/header.php') ?>

<div id="table" class="single-result-table">

</div>


<?php include('../components/footer.php') ?>

<script type="text/javascript">
  

    let search = '<?php echo $_POST['name'] ?>';

    $.ajax({
        type: "post",
        url: "../scripts/main_query.php",
        data: {
            'search': search,
        },
        success: function(data) {           
            table(data);
        }
    })

    function table(data) {
        var t = document.getElementById("table");
        t.style.display = "block";

        var list = data.split("{");
        var users = [];
        var html = "<table class='table table-striped' id='table'><tr><th>item_id</th><th>renter_id</th><th>name</th><th>category</th><th>item_condition</th><th>average_rating</th><th>price</th><th>times_rented</th></tr><tr>"

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
            html += "</tr><tr>"
        }

        html += "</tr></table>"

        t.innerHTML = html;
    }
</script>
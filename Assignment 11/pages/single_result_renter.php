<?php include("../components/header.php") ?>

<head>
    
    <link rel="stylesheet" href="../css/query.css" />

</head>

<div id="table" class="single-result-table">

</div>

<?php include("../components/footer.php") ?>
<script type="text/javascript">
    let user_id= '<?php echo $_POST['user_id'] ?>';
    let username = '<?php echo $_POST['username'] ?>';
    let password = '<?php echo $_POST['password'] ?>';

    let data = window.location.href.split("?dist=")
    data.shift();

    $.ajax({
        type: "post",
        url: "../scripts/queries.php",
        data: {
            'user_id': user_id,
            'username': username,
            'password': password,
            'type': 'renters-full'
        },
        success: function(data) {
            table(data);
        }
    })

    function table(data) {
        console.log(data);
        var t = document.getElementById("table");
        t.style.display = "block";

        var list = data.split("{");
        var users = [];
        var html = "<table class='table table-striped' id='table'><tr><th>Item Name</th><th>Item Category</th><th>Item Price</th><th>Item Rating</th></tr><tr>"

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
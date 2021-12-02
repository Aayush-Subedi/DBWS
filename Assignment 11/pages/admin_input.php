<head>
	<link rel="stylesheet" href="../css/input.css" />
</head>

<?php include("../components/header.php") ?>

<form action="../scripts/inserter.php" method="post" class="form">
	<?php include("../components/user_connect.php") ?>
	<div class="form-group row">
		<label for="title" class="col-sm-2 col-form-label">Title</label>
		<div class="col-sm-10">
			<input class="form-control" name="title" list="positions" required>
			<datalist id="positions">
				<option value="Manager">
				<option value="Reviewer">
				<option value="Developer">
			</datalist>
		</div>
	</div>
	<div class="form-group row">
		<label for="user_id" class="col-sm-2 col-form-label">User Id</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="user_id" placeholder="user_id" required>
			<p id="table" class="hide"></p>
			<button type="button" class="btn btn-primary" id="find" onclick="getData()">Find Users</button>
			<button type="button" class="btn btn-primary hide" id="hide" onclick="h()">Hide</button>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-10">
			<button name="submit" type="submit" class="btn btn-primary" value="admin">Submit</button>
		</div>
	</div>
</form>

<?php include("../components/footer.php") ?>
<!-- =========== Footer  Ends Here ============ -->
<script type="text/javascript">
	function table(data) {
		var t = document.getElementById("table");
		var b = document.getElementById("hide");
		t.style.display = "block";
		b.style.display = "inline";

		var list = data.split("{");
		var users = [];
		var html = "<table class='table  table-striped' id='table'><tr><th>User_id</th><th>First Name</th><th>Last Name</th><th>Email</th></tr><tr>"

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
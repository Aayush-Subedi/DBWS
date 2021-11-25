<head>
	<link rel="stylesheet" href="../css/input.css" />
</head>
<?php include("../components/header.php") ?>

<!-- ============== Main Content Starts ================ -->

<form action="../scripts/inserter.php" method="post" class="form">
	<?php include("../components/user_connect.php") ?>
	<div class="form-group row">
		<label for="fname" class="col-sm-2 col-form-label">First Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="fname" placeholder="fname" required maxlength="32" pattern="[A-Za-z]{1,35}">
		</div>
	</div>
	<div class="form-group row">
		<label for="lname" class="col-sm-2 col-form-label">Last Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="lname" placeholder="lname" required maxlength="32" pattern="[A-Za-z]{1,35}">
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" name="email" placeholder="Email" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" title="make sure to use small letter">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-10">
			<button name="submit" type="submit" class="btn btn-primary" value="user">Submit</button>
		</div>
	</div>
</form>

<!-- ============== Main Content Ends ================ -->
<!-- ========= Footer Starts Here ========= -->
<?php include("../components/footer.php") ?>

<!-- =========== Footer  Ends Here ============ -->
<head>
  <link rel="stylesheet" href="../css/input.css"/>
</head>
<?php include("../components/header.php") ?>

  <!-- ============== Main Content Starts ================ -->
  <form action="../scripts/inserter.php" method="post" class="form">
    <div class="form-group row">
      <label for="fname" class="col-sm-2 col-form-label">fname</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fname" placeholder="fname">
      </div>
    </div>
    <div class="form-group row">
      <label for="lname" class="col-sm-2 col-form-label">lname</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="lname" placeholder="lname">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" placeholder="Email">
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
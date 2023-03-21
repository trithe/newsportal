<?php
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $company_name ?> | About us</title>
</head>

<body>
  <!-- Navigation -->
  <?php include('includes/header.php'); ?>
  <!-- Page Content -->
  <div class="container">
    <?php
    $pagetype = 'aboutus';
    $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
    while ($row = mysqli_fetch_array($query)) {
    ?>
      <h1 class="mt-4 mb-3"><?= ($row['PageTitle']) ?>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>
      <!-- Intro Content -->
      <div class="row">
        <div class="col-lg-12">
          <p><?php echo $row['Description']; ?></p>
        </div>
      </div>
      <!-- /.row -->
    <?php } ?>
  </div>
  <!-- /.container -->
  <!-- Footer -->
  <?php include('includes/footer.php'); ?>
</body>

</html>
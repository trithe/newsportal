<?php
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $company_name ?> | Contact us</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <script src="scripts/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="fontawesome/css/all.min.css" />
</head>

<body>
  <!-- Navigation -->
  <?php include('includes/header.php'); ?>
  <!-- Page Content -->
  <div class="layout-content">
    <section class="reviewer" id="reviewer">
      <h1 class="heading-title">
        <span>អ្នករុករក</span>តំបន់ទេសចរណ៍ក្នុងស្រុក
      </h1>
      <div class="box-container">
        <?php
        $query = mysqli_query($con, "SELECT * FROM members");
        while ($row = mysqli_fetch_array($query)) {
        ?>
          <div class="box">
            <img src="images/avatar/<?= $row['avatar'] ?>" alt='<?= $row['name'] ?>'>
            <h3>
              <?= $row['name'] ?>
            </h3>
            <h5 class="font-wotfard">
              <?= $row['description'] ?>
            </h5>
            <p>
              Coding
            </p>
          </div>
        <?php } ?>
      </div>
    </section>
  </div>
  <!-- Footer -->
  <?php include('includes/footer.php'); ?>
</body>

</html>
 <head>
   <!-- Bootstrap core CSS -->
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="css/modern-business.css" rel="stylesheet">
   <link href="css/style.css" rel="stylesheet">
   <link href="css/sidebar.css" rel="stylesheet">
   <script src="scripts/jquery-3.2.1.min.js"></script>
   <link rel="stylesheet" href="fontawesome/css/all.min.css" />
 </head>

 <header>
   <a href="#" class="logo"><img src="admin/logo/<?= $company_logo ?>" alt="Logo <?= $company_name ?>" /></a>
   <!-- Mobile -->
   <div id="menu-bar" class="fas fa-bars"></div>
   <!-- Laptop -->
   <nav class="navbar" id="navbar">
     <a class="nav-link" href="index.php">ទំព័រដើម</a>
     <a class="nav-link" href="news.php">តំបន់ទេសចរណ៏ក្នុងស្រុក</a>
     <div class="dropdown">
       <a data-toggle="dropdown" style="cursor:pointer">
         ប្រភេទតំបន់
       </a>
       <div class="dropdown-menu">
         <?php $query = mysqli_query($con, "select id,CategoryName from tblcategory where Is_Active = 1");
          while ($row = mysqli_fetch_array($query)) {
          ?>
           <a class="dropdown-item" href="category.php?catid=<?= ($row['id']) ?>"><?= ($row['CategoryName']); ?></a>
         <?php } ?>
       </div>
     </div>
     <a class="nav-link" href="contact-us.php">អ្នករុករក</a>
     <a class="nav-link" href="admin/">Admin</a>
   </nav>

 </header>
 <style>
   @media (max-width: 768px) {
     .dropdown {
       width: 97%;
     }

     .dropdown-menu.show {
       position: static;
       display: block;
       float: none;
       font-size: 0.5rem;
       color: #212529;
       background-color: none;
       background-clip: none;
       border: none;
       border-radius: none;
       margin-left: 20px;
     }
   }
 </style>
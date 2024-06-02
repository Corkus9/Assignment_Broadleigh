<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/bootstrap.css" rel="stylesheet">
     <!-- Vendor CSS Files -->
  <link href="css/vendor/aos/aos.css" rel="stylesheet">
  <link href="css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="css/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="css/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="css/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet"></head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title> <?= $title ?? 'Welcome' ?> </title>
  </head>
  <body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid col-md-6 col-12 mx-auto">
    <a class="navbar-brand text-white" href="./index.php"><H1>Broadleigh Gardens</H1></a>
    

    
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

<?php 
     if (!isset($_SESSION['user']))
     {
         echo '';
     }
     else if (($_SESSION['user']['admin'])==1)
    {
    echo '<li class = "nav-item"><a class="nav-link text-white" href="./admin.php"><h2>Admin</h2></a></li>';
    }
    ?>


      <li class="nav-item">
      <a class="nav-link text-white" href="./products.php"><h2>Products</h2></a>
      </li>
      <li class="nav-item">
      <a class="nav-link text-white" href="./member.php"><h2>Account</h2></a>
      </li>
      <li class="nav-item">
        <?php 
        if (!isset($_SESSION['user']))
    {
        ?>
          <a class="nav-link text-white" href="./login.php"><i class="bi bi-person-circle" style="font-size: 2rem"></i></a>
          <?php } else{
            ?>
            <a class="nav-link text-white" href="./login.php"><i class="bi bi-door-open-fill" style="font-size: 2rem"></i></a>
          <?php }?>

      </li>
      </ul>

      
    </div>
  </div>
</nav>
<?php
require('connectdb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FOODIE</title>

  <!-- Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!--BootstrapIcons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- Custom CSS file -->
  <link rel="stylesheet" href="style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

</head>

<body>

  <!-- start #header -->

  <!-- Primary Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fs-3" style="font-family: 'Dancing Script', cursive, sans-serif " href="#home">FOODIE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">ABOUT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">CONTACT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signin.php">SIGN IN / SIGN UP</a>
          </li>
        </ul>
        <form href="signin.php">
          <a href="cart.php" class="py-2 rounded-pill bg-primary">
            <span class="px-2 text-white"><i class="bi bi-cart-check-fill fs-4"></i></span>
            <span class="px-3 py-2 rounded-pill text-dark bg-light">0</span>
          </a>
        </form>
      </div>
    </div>
  </nav>
  <!-- !Primary Navigation -->

  <!-- start #main-site -->
  <main id="main-site">

    <!-- carousel -->
    <?php
    include('template/banner.php')
    ?>
    <!-- carousel -->

    <!--About Us-->
    <?php
    include('template/about.php')
    ?>
    <!--!About Us-->

    </header>
    <!-- !start #header -->
    <!--Tabs-->
    <?php
    include('template/tabs.php')
    ?>
    <!--!Tabs-->


    <!-- Chaats -->
    <?php
    include('template/chaats.php');
    ?>
    <!-- !Chaats -->

    <!-- South Indian -->
    <?php
    include('template/southindian.php')
    ?>
    <!-- !South Indian -->

    <!-- North Indian -->
    <?php
    include('template/northindian.php')
    ?>
    <!-- !North Indian -->


    <!-- Pizzas-->
    <?php
    include('template/pizzas.php')
    ?>
    <!-- !Pizzas -->

    <!-- Burgers -->
    <?php
    include('template/burgers.php')
    ?>
    <!-- !Burgers -->

    <!-- Juices -->
    <?php
    include('template/juices.php')
    ?>
    <!-- !Juices -->

    <!-- Hot Beverages -->
    <?php
    include('template/beverages.php')
    ?>
    <!-- !Hot Bevarages -->


    <?php
    include('footer.php')
    ?>
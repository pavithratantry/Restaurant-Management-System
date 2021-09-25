<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: signin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WELCOME  </title>

  <!-- Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!--BootstrapIcons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- Custom CSS file -->
  <link rel="stylesheet" href="style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

  <?php
    require('connectdb.php');
    
  ?>

</head>

<body>

  <!-- start #header -->

  <!-- Primary Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fs-3" style="font-family: 'Dancing Script', cursive, sans-serif " href="#home">FOODIE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">ABOUT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">CONTACT US</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="signout.php">SIGN OUT</a>
          </li>
        </ul>
        <span class="px-1 text-white">
            Welcome, <?php echo $_SESSION['email'] ?>
</span>

        
          <a href="viewcart.php" class="py-2 rounded-pill bg-primary">
            <span class="px-2 text-white"><i class="bi bi-cart-check-fill fs-4"></i></span>
            
            <?php
            if(isset($_SESSION['cart'])){
              $count = count($_SESSION['cart']);
              echo "<span class=\"px-3 py-2 rounded-pill text-dark bg-light\">$count</span>";
            }
            else{
              echo "<span class=\"px-3 py-2 rounded-pill text-dark bg-light\">0</span>";
            }
            ?>
          </a>
        
      </div>
    </div>
  </nav>
  <!-- !Primary Navigation -->

  <!-- start #main-site -->
  <main id="main-site">


<?php
/*banner*/

include('template/banner.php');

/*banner*/
/*about*/

include('template/about.php');

/*aboutus-->
</header>
/*start #header -->

/*Tabs*/

include('template/tabs.php');

/*Tabs*/
/*Chaats*/

include('template/chaats.php');

/*!Chaats*/

/*South Indian*/

include('template/southindian.php');

/*!South Indian*/

/*North Indian*/

include('template/northindian.php');

/*!North Indian*/

/*Pizzas*/
include('template/pizzas.php');

/*!Pizzas*/

/*Burgers*/

include('template/burgers.php');

/*!Burgers*/

/*Juices*/

include('template/juices.php');

/*!Juices*/

/*Hot Beverages*/

include('template/beverages.php');

/*!Hot Bevarages*/
?>

<?php
include('footer.php')
?>
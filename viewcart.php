<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CART</title>

  <!-- Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!--BootstrapIcons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- Custom CSS file -->
  <link rel="stylesheet" href="style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

  <style>
  body{
  background-color: #e9edc9;
}
    </style>
  <?php
  require('connectdb.php');

  ?>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fs-3" style="font-family: 'Dancing Script', cursive, sans-serif " href="#home">FOODIE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="welcome.php">MENU</a>
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



        <a href="viewcart.php" class="py-2 rounded-pill bg-primary">
          <span class="px-2 text-white"><i class="bi bi-cart-check-fill fs-4"></i></span>
          <?php
          session_start();

          if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
            echo "<span class=\"px-3 py-2 rounded-pill text-dark bg-light\">$count</span>";
          } else {
            echo "<span class=\"px-3 py-2 rounded-pill text-dark bg-light\">0</span>";
          }
          ?>
        </a>

      </div>
    </div>
  </nav>

  <!--Shopping cart section-->
  <section id="cart" class="py-3  px-5">

    <div class="container-fluid">
      <h2>Shopping Cart</h2>
      <hr>
    </diV>
    <?php


    $total = 0;
    $sumtotal = 0;
    $index = 0;

    if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $key => $value) {
        $total = $value['item_price'] * $value['item_quantity'];
        $sumtotal += $value['item_price'] * $value['item_quantity'];
        $index = $key + 1;
    ?>




        <!--Shopping items section-->
        <div class="row">
          <form method='POST' action='cart.php'>
            <div class="col-sm-9">
              <!--cart items-->
              <div class="row border-top py-3 mt-3">

                <div class="col-sm-1">
                  <?php echo $index ?>
                </div>
                <div class="col-sm-9">
                  <h5><input type='hidden'  name='item_name' value="<?php echo $value['item_name'] ?>"><?php echo $value['item_name'] ?></h5>
                  <small>
                    <div>
                      <span class="product_price fs-5"><span>₹</span><input type='hidden' name='item_price' value="<?php echo $value['item_price'] ?>"><?php echo $value['item_price'] ?></span>
                    </div>
                  </small>
                  <!--product quantity-->
                  <div class="qty d-flex pt-2">
                    <diV class=d-flex>
                      <input type='number' class="form-label" name='item_quantity' value="<?php echo $value['item_quantity'] ?>">
                    </div>
                    <?php echo "
                      <button name='update' class='btn btn-outline-warning btn-sm  px-3 mt-3 mx-3'>Update Quantity</button>
                      <button name='remove' class='btn btn-outline-danger btn-sm px-3 mt-3 mx-3 border-right'>Delete</button>
                      <input type = 'hidden' name = 'items' value = '$value[item_name]' > ";
                    ?>

                  </div>




                  <!--product quantity-->
                </div>


                <div class="col-sm-2 text-right">
                  <div class="text-danger">
                    <span class="product_price fs-4"><span>₹</span><?php echo $total ?></span>
                  </div>
                </div>

              </div>
            </div>
          </form>


          <!--!cart items-->
      <?php          }
    } ?>
      <!--subtotal-->
      <div class="col">
        <div class="sub-total border text-center mt-2">
          <h6 class=" text-success py-3"><i class="bi bi-cart-check-fill">Your items in the cart</i></h6>
          <div class="border-top py-4">
            <h5>Subtotal:&nbsp;<span class="text-danger">₹<span class="text-danger fs-3" id="totalprice"><?php echo number_format($sumtotal, 2) ?></span></span></h5>


            <form method="GET" action="checkout.php">
              <button type="submit" class="btn btn-warning mt-3 mb-3">Proceed to buy</button>
            </form>
          </div>
        </div>
        <!--subborder-->
      </div>

      <!--subtotal-->

        </div>
        <!--!Shopping Items section-->
        </div>

  </section>
  <!--!Shopping Cart Section-->






</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHECKOUT</title>

  <link rel="stylesheet" href="style.css">

</head>

<body>




  <?php

  include('header.php');
  include('connectdb.php');
  $total = 0;
  $sumtotal = 0;
  $index = 0;

  if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
      $total = $value['item_price'] * $value['item_quantity'];
      $sumtotal += $value['item_price'] * $value['item_quantity'];
      $index = $key + 1;

      $esql = "INSERT INTO `cart`(`item_name`,`item_quantity`,`item_price`,`cust_email`,`sumtotal`) VALUES ('$value[item_name]','$value[item_quantity]','$value[item_price]','$_SESSION[email]','$total')";
      $result = mysqli_query($conn, $esql);
      if ($result === true) {
        $sql = "UPDATE cart SET item_id = (SELECT item_id FROM item WHERE item.item_name = cart.item_name)";
        $result1 = mysqli_query($conn, $sql);
      }
    }
  }
  ?>
  <img src="imgs/cart.jpg">

  <div class="info">
    <h1>Your order is almost placed!</h1>
    <p>Please confirm your order.</p>
  </div>
  <section class="section">
    <h3><u>ORDER DETAILS</u></h3>
    <ul class="grid">
      <li>
        <h5>Date</h5>

        <p class="fs-5"><?php echo $date = date('d/m/Y', time()); ?></p>
      </li>
      <li>
        <h5>Total</h5>
        <p><span>₹<span class="fs-5 "><?php echo $sumtotal ?></span></span></p>
      </li>
      <li>
        <h5>Payment method</h5>
        <p>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            Cash on Delivery
          </label>
        </div>
        </p>
      </li>
    </ul>

  </section>


  <section class="section">
    <h3><u>PRODUCT DETAILS</u></h3>

    <div class="table-responsive">
      <table class="table table-bordered text-center table table-striped w-50">
        <thead class="bg-primary text-light fs-5">
          <th>No</th>
          <th>Item Name</th>
          <th>Item Price</th>
          <th>Item Quantity</th>
          <th>Total Price</th>

        </thead>
        <tbody>
          <?php


          $total = 0;
          $sumtotal = 0;
          $index = 0;

          if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
              $total = $value['item_price'] * $value['item_quantity'];
              $sumtotal += $value['item_price'] * $value['item_quantity'];
              $index = $key + 1;
              echo "  
 <form method='POST' action = 'cart.php'>
 <tr>
        <td>$index</td>
        <td><input type='hidden' name='item_name' value ='$value[item_name]'>$value[item_name]</td>
        <td><input type='hidden' name='item_price' value = '$value[item_price]' >$value[item_price]</td>
        <td><input type='hidden' name='item_quantity' value = '$value[item_quantity]' >$value[item_quantity]</td>
        <td>$total</td>
      
        </tr>
        </form>
        ";
            }
          }
          ?>

        </tbody>
      </table>
    </div>
    </div>




  </section>

  <div id="orderconfirmation">

    <form method="GET" action="order.php">
      <button type="submit" class="btn btn-success">Place Order</button>

  </div>

</body>

</html>
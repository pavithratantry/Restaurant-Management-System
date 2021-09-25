<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: adminsignin.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN</title>
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
    table {
      margin: 0 auto;
    }
  </style>
  <?php
  require('connectdb.php');

  ?>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand fs-3" style="font-family: 'Dancing Script', cursive, sans-serif " href="#home">FOODIE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <span class="text-light">ADMINISTRATION</span>

        </div>
        <span class="px-1 text-light text-right">
          Welcome Admin, <?php echo $_SESSION['username'] ?>
        </span>
      </div>
    </nav>

  </header>


  <ul class="nav nav-pills">

    <a class="nav-link active" aria-current="page" href="adminpage.php">Active Orders</a>
    <a class="nav-link" href="#">Menu</a>
    <a class="nav-link" href="#">Customers</a>
    <a class="nav-link">Employees</a>
    <a class="nav-link">Customer Queries</a>
    <a class="nav-link">About Us</a>
    <a class="nav-link" href="adminsignout.php">Sign Out</a>


  </ul>

  <?php
  $sql = "SELECT D.no,D.order_id, D.ord_time, D.item_name, D.item_quantity, D.cust_email, C.cust_name, C.cust_phone, C.cust_address 
FROM cart_orders D,customer C 
WHERE D.cust_email=C.cust_email";
  $result = mysqli_query($conn, $sql); {   ?>
    <h1 class="mt-5 mx-3 px-2 py-2">ORDERS</h1>
    <hr>
    <div class="table-responsive">
      <table class="table table-borderless table-striped table-hover mt-5 text-center w-75">
        <thead>
          <tr>
            <th>SL NO</th>
            <th>ORDER NO</th>
            <th>ORDER TIME</th>
            <th>ITEM</th>
            <th>QUANTITY</th>
            <th>CUSTOMER EMAIL</th>
            <th>CUSTOMER NAME</th>
            <th>CUSTOMER PHONE</th>
            <th>CUSTOMER ADDRESS</th>
            <td></td>


          </tr>
        </thead>
        <?php
        while ($row = mysqli_fetch_array($result)) {
          $no = $row['no'];
        ?>
          <tbody>

            <tr>

              <td><?php echo $row['no']; ?></td>
              <td><?php echo $row['order_id']; ?></td>
              <td><?php echo $row['ord_time']; ?></td>
              <td><?php echo $row['item_name']; ?></td>
              <td><?php echo $row['item_quantity']; ?></td>
              <td><?php echo $row['cust_email']; ?></td>
              <td><?php echo $row['cust_name']; ?></td>
              <td><?php echo $row['cust_phone']; ?></td>
              <td><?php echo $row['cust_address']; ?></td>

              <?php echo  "<td><button class='btn btn'><a href='adminpage.php?no=$no'><i class='bi bi-check-circle-fill'></i></a></button></td>"; ?>
            </tr>
          </tbody>
      <?php
        }
      }

      ?>

      </table>
    </div>

    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

      $no = $_GET['no'];




      // sql to delete a record
      $sql = "DELETE FROM cart_orders WHERE `no`='$no'";
      $result = mysqli_query($conn, $sql);
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>

</html>
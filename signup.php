<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'connectdb.php';
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  //check whether this username already exists
  $esql = "SELECT * FROM `customer` WHERE email = '$email'";
  $result = mysqli_query($conn, $esql);
  $numrows = mysqli_num_rows($result);

  if ($numrows > 0) {

    $showError = "Username already exists";
  } else {

    if (($password == $cpassword)) {

      $sql = "INSERT INTO `customer` (`cust_name`, `cust_phone`, `cust_address`, `cust_email`, `cust_password`, `register_time`) VALUES ('$name','$phone', '$address', '$email','$password', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $showAlert = true;
      }
    } else {
      $showError = "Passwords do not match";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIGNUP</title>

  <style>
    footer {

      bottom: 0px;
      width: 100%;
    }
  </style>

  <!-- Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!--BootstrapIcons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

</head>

<body>

  <!-- start #header -->

  <header>
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
              <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">ABOUT US</a>
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
  </header>
  <!--!header-->

  <main>
    <?php
    if ($showAlert) {
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if ($showError) {
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <section id="signup">
      <div class="container">
        <h1 class="text-center py-3">SIGN UP</h1>
        <form action="signup.php" method="post">

          <div class="form-group mb-3 col-md-6 m-auto">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingName" placeholder="name" name="name" required>
              <label for="floatingInput">Full Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPhone" placeholder="phone" name="phone" title="Give 10 digit number" pattern="[1-9]{1}[0-9]{9}" required>
              <label for="floatingPhone">Mobile Number</label>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="address" id="floatingAddress" name="address" required></textarea>
              <label for="floatingAddress">Address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingEmail" placeholder="email" name="email" required>
              <label for="floatingEmail">Email</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])+$" title="At least one upper case letter, one lower case letter, one digit, one special character, Minimum eight in length" required>
              <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingCPassword" placeholder="CPassword" name="cpassword" title="At least one upper case letter, one lower case letter, one digit, one special character" required>
              <label for="floatingCPassword">Confirm Password</label>
              <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
            </div>


            <div class="text-center">
              <button type="submit" class="btn btn-primary ">SignUp</button>
            </div>
        </form>

        <form action="signin.php">
          <div class="text-center py-5">
            <small>Already have an account?</small>
            <button type="submit" class="btn btn-primary">Sign In</button>
          </div>
        </form>
      </div>
    </section>
    <?php
    include('footer.php')
    ?>

    <!-- !start #footer -->
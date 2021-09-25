<?php
//include header
include('header.php');
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
   header("location: signin.php");
   exit;
} else {
   $_SESSION['loggedin'];
}
?>

<?php
//include cart


$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_quantity = $_POST['item_quantity'];

if (isset($_POST['addCart'])) {
   $check_product = array_column($_SESSION['cart'], 'item_name');
   if (in_array($item_name, $check_product)) {
      echo " <script>alert('product already added');
      window.location.href='welcome.php';
      </script>";
   } else {
      $_SESSION['cart'][] = array('item_name' => $item_name, 'item_price' => $item_price, 'item_quantity' => $item_quantity);
      //print_r($_SESSION['cart']);
      header("location:viewcart.php");
   }
}

//delete from cart
if (isset($_POST['remove'])) {
   foreach ($_SESSION['cart'] as $key => $value) {
      if ($value['item_name'] === $_POST['items']) {
         unset($_SESSION['cart'][$key]);
         $_SESSION['cart'] = array_values($_SESSION['cart']);
         header("location:viewcart.php");
      }
   }
}
//update quantity
if (isset($_POST['update'])) {
   foreach ($_SESSION['cart'] as $key => $value) {
      if ($value['item_name'] === $_POST['items']) {
         ($_SESSION['cart'])[$key] = array(
            'item_name' => $item_name,
            'item_price' => $item_price,
            'item_quantity' => $item_quantity
         );
         //print_r($_SESSION['cart']);
         header("location:viewcart.php");
      }
   }
}


?> 


    <?php
      //include footer
      include('footer.php')
      ?>
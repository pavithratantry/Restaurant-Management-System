<?php
$order_id = "ORD" . strval(mt_rand(100000, 999999));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="order.css">

</head>

<body>
    <?php

    session_start();
    include('connectdb.php');
    $total = 0;
    $sumtotal = 0;
    $index = 0;

    if (isset($_SESSION['cart'])) {

        foreach ($_SESSION['cart'] as $key => $value) {
            $total = $value['item_price'] * $value['item_quantity'];
            $sumtotal += $value['item_price'] * $value['item_quantity'];
            $index = $key + 1;

            $esql = "INSERT INTO `cart_orders`(`order_id`, `ord_time`, `item_name`, `item_quantity`, `cust_email`,`order_price`) 
                            VALUES ('$order_id',current_timestamp(),'$value[item_name]','$value[item_quantity]','$_SESSION[email]','$sumtotal')";
            $result = mysqli_query($conn, $esql);
            if ($result === true) {
                $sql = "UPDATE cart_orders SET item_id = (SELECT item_id FROM item WHERE item.item_name = cart_orders.item_name)";
                $result1 = mysqli_query($conn, $sql);
            }
        }
    }

    ?>
    <section id="success">
        <div class="success-animation">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
            </svg>
        </div>
    </section>
    <section id="panel">
        <div class="panel">

            <div class="plan">
                <small class="text-center">#order no </small>
                <h2 class="order_id"><?php echo $order_id;  ?></h2>

                <span class="order_text">Order Placed</span>
                <span>We've sent you a mail with all the details.</span>
                <p>Thank You</p>
                <form action='welcome.php'>
                    <button type='submit' class="button">Back to Home</button>
                </form>
            </div>




        </div>
    </section>

    <?php



    ?>

</body>

</html>
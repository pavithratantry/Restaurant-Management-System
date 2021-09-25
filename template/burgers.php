<section id="burgers" class="container-fluid">
  <div class="container py-5">
    <h4>BURGERS & FRIES</h4>
    <hr>
  </div>

  <div class="container">
    <div class="row">
    <?php

$sql = "SELECT * FROM `item` WHERE `category_id` = 5";
$result = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_assoc($result)) 
{
?>
      <div class="col-sm-6 col-md-3 col-xl-3">
                <div class="card h-100">

                  <form method="POST" action="cart.php">
                    <img class="card-img-top" src=<?php echo $data['item_image'] ?> alt="burgers">

                    <div class="card-body">
                      <h5 class="card-title text-danger"><?php echo $data['item_name'] ?><span>₹<span><?php echo $data['item_price'] ?></span></span></h5>
                      <p class="card-text"><?php echo $data['item_descr'] ?>
                      </p>
                      <div class="rating text-warning">
                        <span><i class="bi bi-star-fill"></i></span>
                        <span><i class="bi bi-star-fill"></i></span>
                        <span><i class="bi bi-star-fill"></i></span>
                        <span><i class="bi bi-star-fill"></i></span>
                        <span><i class="bi bi-star-fill"></i></span>
                      </div>

                      <div class="py-3">
                        <input type="number" value="1" min="1" max="50" name="item_quantity">
                      </div>
                      <input type="hidden" name='item_id' value="<?php echo $data['item_id'] ?>">
                      <input type="hidden" name='item_name' value="<?php echo $data['item_name'] ?>">
                      <input type="hidden" name='item_price' value="<?php echo $data['item_price'] ?>">


                      <div class=" container px-0 py-3">
                      <button type="submit" class=" btn btn-outline-success btn-sm" name="addCart">ADD TO CART</button>
                    </div>

                </div>
                </form>
              </div>
          </div>
        <?php }  ?>
     </div>
  </div>



</section>
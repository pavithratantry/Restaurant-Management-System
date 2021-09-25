<section id="northindian" class="container-fluid">
  <div class="container py-5">
    <h4>NORTH-INDIAN</h4>
    <hr>
  </div>
  <div id="carouselExampleControls3" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">
      <div class="carousel-item active ">
        <div class="container">
          <div class="row">
          <?php

$sql = "SELECT * FROM `item` WHERE category_id='3'
order by item_id ASC limit 4";
$result = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_assoc($result)) 
{
?>
           <div class="col-sm-6 col-md-3 col-xl-3">
                <div class="card h-100">

                  <form method="POST" action="cart.php">
                    <img class="card-img-top" src=<?php echo $data['item_image'] ?> alt="chapathi">

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


                      <div class="container px-0 py-3">
                        <button type="submit" class=" btn btn-outline-success btn-sm" name="addCart">ADD TO CART</button>
                      </div>

                    </div>
                  </form>
                </div>
              </div>
            <?php }  ?>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container">
          <div class="row">
          <?php

$sql = "SELECT * FROM `item` WHERE `category_id` = 3 AND `item_id` > 20";
$result = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_assoc($result)) 
{
?>
            <div class="col-sm-6 col-md-3 col-xl-3">
                <div class="card h-100">

                  <form method="POST" action="cart.php">
                    <img class="card-img-top" src=<?php echo $data['item_image'] ?> alt="pulav">

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


                      <div class="container px-0 py-3">
                        <button type="submit" class=" btn btn-outline-success btn-sm" name="addCart">ADD TO CART</button>
                      </div>

                    </div>
                  </form>
                </div>
              </div>
            <?php }  ?>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</section>
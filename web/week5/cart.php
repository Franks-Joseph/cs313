<?php
session_start();
$product_ids = array();
session_destroy();

// Check if Add to Cart button had been submitted
if(filter_input(INPUT_POST, 'add_to_cart')){
  if(isset($_SESSION['shopping_cart'])){

  }
  else { // If cart not exists, create 1st product with array key of 0
    // Create array with submitted form data, start from key 0 and fill with values
    $_SESSION['shopping_cart'][0] = array
    (
        'id' => filter_input(INPUT_GET, 'id'),
        'name' => filter_input(INPUT_POST, 'name'),
        'price' => filter_input(INPUT_POST, 'price'),
        'quantity' => filter_input(INPUT_POST, 'quantity')
    );
  }
}
// This is meant to test the $_SESSION that is created.
pre_r($_SESSION);

function pre_r($array) // This will show the array after the user clicks 'add to cart' in a pretty way.
{
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Cart</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="cart.css">
   </head>
   <body>
     <div class="container">
       <?php
       require 'connect_db.php';
       $db = connect_db();
// See the comparison with the fetch pg_fetch_assoc and the fetch FETCH_ASSOC from
// cart.php and cart_test.php. The cart_test.php prints where this one doesn't. See how to make
// $product work in cart_test.php. Check the video on youtube. The link is below.
// https://www.youtube.com/watch?v=YvXaKDnHKVk You are at 23:45.
       $statement = $db->prepare("SELECT name, image, price FROM products");
       $statement->execute();
       if ($statement):
         if (pg_num_rows($statement)>0):
        // while ($product = pg_fetch_assoc($statement)):
           while ($product = $statement->fetch(PDO::FETCH_ASSOC)):
             //print_r($product); // This doesn't work for some reason. Maybe the line above is the issue.
             ?>
             <!-- Creates a responsive grid layout using bootstrap -->
             <div class="col-sm-4 col-md-3">
               <form method="post" action="index.php?action=add&id=<?php echo $product['id']; ?>">
                 <!-- Here we are going to put the items down that are in the products table in a nice way. -->
                 <img src="<?php echo $product['image']; ?>" class="img-responsive">
                 <h4 class="text-info"><?php echo $product['name']; ?></h4>
                 <h4>$ <?php echo $product['price']; ?></h4>
                 <input type="text" name="quantity" class="form-control" value="1">
                 <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                 <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                 <input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-info" value="Add to Cart">
               </form>
             </div>
             <?php
           endwhile;
         endif;
       endif;
        ?>
     </div>
   </body>
 </html>

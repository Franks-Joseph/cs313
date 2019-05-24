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
       printf("test")
       $statement = $db->prepare("SELECT name, image, price FROM products");
       $statement->execute();

       if ($statement):
         if (pg_num_rows($statement)>0):
           while ($product = pg_fetch_assoc($statement)):
             //print_r($product);
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
                 <input type="submit" name="add-to-cart" class="btn btn-info" value="Add to Cart">
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

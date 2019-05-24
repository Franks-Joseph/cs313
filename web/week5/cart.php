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

       $statement = $db->prepare("SELECT name, image, price FROM products");
       $statement->execute();

       if ($statement):
         if (pg_num_rows($statement)>0):
           while ($product = pg_fetch_assoc($statement)):
             print_r($product);
             ?>
             <!-- Creates a responsive grid layout using bootstrap -->
             <div class="col-sm-4 col-md-3">
               <form method="post" action="index.php?action=add&id=<?php echo $product['id']; ?>">
             </div>
             <?php
           endwhile;
         endif;
       endif;
        ?>
     </div>

   </body>
 </html>

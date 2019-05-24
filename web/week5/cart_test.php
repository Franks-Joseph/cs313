<?php
require 'connect_db.php';
$db = connect_db();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Cart</title>
   </head>
   <body>
     <div>
       <h1>Test</h1>

       <?php
         $statement = $db->prepare("SELECT name, image, price FROM products");
          $statement->execute();
          while ($row = $statement->fetch(PDO::FETCH_ASSOC))
          {
          	$name = $row['name'];
          	$image = $row['image'];
          	$price = $row['price'];
          	echo "<ul>
            <li>$name
            <li>$image
            <li>$price
                 </ul>";
          }

        ?>
     </div>
   </body>
 </html>

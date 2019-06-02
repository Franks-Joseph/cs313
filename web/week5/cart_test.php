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
        'id' => filter_input(INPUT_GET, 'id'), //for some reason I cannot get the id to show a number.
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
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Cart</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="cart.css">
   </head>
   <body>
     <div class="container">
       <div class="row">
           <?php
             require 'connect_db.php';
             $db = connect_db();

             $statement = $db->prepare("SELECT name, image, price FROM products");
             $statement->execute();
                  while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                  {
                    //print_r($row);
                    $id = isset($_POST['id']) ? $_POST['id'] : '';
                    ?>
                    <!-- Creates a responsive grid layout using bootstrap -->
                    <div class="d-inline col-sm-4 col-md-3">
                      <form method="post" action="cart_test.php?action=add&id=<?php echo $row['id']; ?>">
                        <div class="products">
                          <!-- Here we are going to put the items down that are in the products table in a nice way. -->
                          <img src="<?php echo "./" . $row['image']; ?>" class="img-responsive" style="width:100%;">
                          <h4 class="text-info"><?php echo $row['name']; ?></h4>
                          <h4>$ <?php echo $row['price']; ?></h4>
                          <input type="text" name="quantity" class="form-control" value="1">
                          <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                          <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                          <input type="submit" name="add_to_cart" style="margin-top: 7px;" class="btn btn-info" value="Add to Cart">
                        </div>
                      </form>
                    </div>
                    <?php
                  }
            ?>
       </div>
     </div>
   </body>
 </html>

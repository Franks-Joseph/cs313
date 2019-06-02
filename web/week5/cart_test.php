<?php
session_start();
$product_ids = array();
session_destroy();

// Check if Add to Cart button had been submitted
if(filter_input(INPUT_POST, 'add_to_cart')){
  if(isset($_SESSION['shopping_cart'])){

    //count the products
    $count = count($_SESSION['shopping_cart']);

    //create array for the array that matches the keys
    $product_ids = array_column($_SESSION['shopping_cart'], 'id');

    if(!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
      $_SESSION['shopping_cart'][$count] = array
      (
          'id' => filter_input(INPUT_GET, 'id'), //for some reason I cannot get the id to show a number.
          'name' => filter_input(INPUT_POST, 'name'),
          'price' => filter_input(INPUT_POST, 'price'),
          'quantity' => filter_input(INPUT_POST, 'quantity')
      );
    }
    else { //if it already exists, increase the quantity
      //match array key to id of the product
      for ($i = 0; $i < count($product_ids); $i++){
        if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
          // add item quantity
          $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
        }
      }
    }

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

if(filter_input(INPUT_GET, 'action') == 'delete'){
  //loop through the products in the cart to match the GET id.
  foreach ($_SESSION['shopping_cart'] as $key => $row){
    if($row['id'] == filter_input(INPUT_GET), 'id')){
      //remove prodcut from the shopping cart when id matches.
      unset($_SESSION['shopping_cart'][$key]);
    }
  }
  //reset session array keys so they match array
  $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

// This is meant to test the $_SESSION that is created.
//pre_r($_SESSION);

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
       <div style="clear:both"></div>
       <br />
       <div class="table-responsive">
         <table class="table">
           <tr><th colspan="5"><h3>Order Details</h3></th></tr>
           <tr>
             <th width="40%">Product Name</th>
             <th width="10%">Quantity</th>
             <th width="20%">Price</th>
             <th width="15%">Total</th>
             <th width="5%">Action</th>
           </tr>
           <?php
           if (!empty($_SESSION['shopping_cart'])):
             $total = 0;
             foreach ($_SESSION['shopping_cart'] as $key => $row) {
               ?>
               <tr>
                 <td><?php echo $row['name']; ?></td>
                 <td><?php echo $row['quantity']; ?></td>
                 <td>$ <?php echo $row['price']; ?></td>
                 <td>$ <?php echo number_format($row['quantity'] * $row['price'], 2); ?></td>
                 <td>
                   <a href="cart_test.php?action=delete&id<?php echo $row['id']; ?>">
                     <div class="btn-danger">Remove</div>
                   </a>
                 </td>
               </tr>
               <?php
                        $total = $total + ($row['quantity'] * $row['price']);
             }
             ?>
             <tr>
               <td colspan="3" align="right">Total</td>
               <td align="right">$ <?php echo number_format($total, 2); ?></td>
               <td></td>
             </tr>
             <tr>
               <!-- Show checkout button only if the shopping cart is !emtpy -->
               <td colspan="5">
                 <?php
                    if (isset($_SESSION['shopping_cart'])):
                      if (count($_SESSION['shopping_cart']) > 0):
                  ?>
                    <a href="#" class="button">Checkout</a>
                  <?php endif; endif; ?>
               </td>
             </tr>
             <?php
           endif;
              ?>
         </table>
       </div>
     </div>
   </body>
 </html>

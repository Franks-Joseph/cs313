<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Cart</title>
  </head>
  <body>
    <h2>Your Cart</h2>
    <hr>
    <br>
    <div class="cart-list">
      <?php
          if (isset($_POST['addcart'])) {
            if (!empty($_POST['items'])) {
              foreach ($_POST['items'] as $selected) {
                echo "<ul>
                        <li>$selected</li>
                      </ul>
                      <br>";
              }
            }
          }
       ?>
    </div>
    <div class="go-back">
      <form action="browse.php" method="post">
			     <input type="submit" value="Go Back">
      </form>
    </div>
    <div class="checkout">
      <form action="checkout.php" method="post">
			     <input type="submit" value="Checkout">
      </form>
    </div>
  </body>
</html>

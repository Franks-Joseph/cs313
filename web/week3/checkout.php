<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Checkout</title>
  </head>
  <body>
    <form class="Checkout" action="confirmation.php" method="post">
      <h2>Checkout</h2>
        <hr>
        <h5>Primary Information</h5>
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Name">
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email">
        <br>
        <hr>
        <h3>Shipping Information</h3>
        <hr>
        <label for="cs">Address</label>
        <input type="text" name="address" placeholder="Address">
        <br>
        <label for="wdd">City</label>
        <input type="text" name="city" placeholder="City">
        <br>
        <label for="cit">State</label>
        <input type="text" name="state" placeholder="State">
        <br>
        <label for="ce">Zip</label>
        <input type="text" name="zip" placeholder="Zip">
        <br>
        <hr>
        <input type="submit" value="Submit Purchase">
    </form>
    <div class="go-back">
      <form action="browse.php" method="post">
			     <input type="submit" value="Go Back">
      </form>
    </div>
  </body>
</html>

<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Browse Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="browse.css">
     <script src="browse.js"></script>
  </head>
  <body>
    <header class="header">
      <nav class="nav-head">
        <div class="logo">
          <a href="browse.html">
            <img src="https://i.imgur.com/vGlPCEA.png" alt="Computer Parts Logo" class="img-logo">
          </a>
        </div>
      </nav>
    </header>
    <br>
    <h2>Browse Parts</h2>
    <hr>
    <section class="browse-section">
      <h4>Computer Parts</h4>
      <div class="browse-form">
        <form class="browse-form" action="cart.php" action="confirmation.php" method="post">
          <div class="items-grid">
            <!--This is where the items are displayed-->
            <ul>
              <li class="item" style="list-style-type: none; border: solid 1px black;">
                <h2>Item</h2>
                <img src="https://i.imgur.com/IUVKMhS.jpg" alt="hdmi" style="width: 100%;">
                <p class="price">15.99$</p>
                <p>This is a product description</p>
                <!--To get value of multiple checked checkboxes, name attribute in HTML input type=”checkbox” tag must be initialize with an array,
                to do this write [ ] at the end of it’s name attribute.-->
                <p>
                  <input type="checkbox" name="items[]" value="HDMI" id="HDMI"><label for="HDMI"> Add me</label>
                </p>
              </li>
              <li class="item" style="list-style-type: none; border: solid 1px black;">
                <h2>Item</h2>
                <img src="https://i.imgur.com/IUVKMhS.jpg" alt="hdmi" style="width: 100%;">
                <p class="price">15.99$</p>
                <p>This is a product description</p>
                <p>
                  <input type="checkbox" name="items[]" value="thermal paste" id="thermal past"><label for="thermal paste">Add</label>
                </p>
              </li>
              <li class="item" style="list-style-type: none; border: solid 1px black;">
                <h2>Item</h2>
                <img src="https://i.imgur.com/IUVKMhS.jpg" alt="hdmi" style="width: 100%;">
                <p class="price">15.99$</p>
                <p>This is a product description</p>
                <p>
                  <input type="checkbox" name="items[]" value="rj45" id="rj45"><label for="rj45">Add</label>
                </p>
              </li>
              <li class="item" style="list-style-type: none; border: solid 1px black;">
                <h2>Item</h2>
                <img src="https://i.imgur.com/IUVKMhS.jpg" alt="hdmi" style="width: 100%;">
                <p class="price">15.99$</p>
                <p>This is a product description</p>
                <p>
                  <input type="checkbox" name="items[]" value="bread board" id="bread board"><label for="bread board">Add</label>
                </p>
              </li>
            </ul>
          </div>
            <div class="cart">
              <a href="cart.html" class="cart-link">
                <span><input type="submit" name="addcart" value="Add to Cart"></span>
              </a>
            </div>

        </form>
      </div>
    </section>
    <footer>
      <p>Posted By: Joseph Franks</p>
      <p></p>
    </footer>
  </body>
</html>

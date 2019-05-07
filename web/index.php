<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <title>CIT313 Index</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    
      <link rel="stylesheet" type="text/css" media="screen" href="index.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="index.js"></script>
  </head>
  <body>
    <div class="main-container">
      <div class="head-container">
        <h1 style="text-align:center">CIT313 Index</h1>
        <h3 style="text-align:center">Joseph Franks</h3>
      </div>
      <div class="bio-container">
        <h3 style="text-align:center">A little about me...</h3>
        <hr>
        <p>I like to be with my family.</p>
        <p>I enjoy computers and programming. I like to play with my son and do things together. It's important to me that Family remains as one of the most important things to take care of.</p>
      </div>
      <div class="pic-container">
        <div class="profile-picture">
          <img src="https://i.imgur.com/H6h9fFp.jpg">
        </div>
      </div>
      <div class="server-timer-container">
        <div id="timestamp">
          <?php
          	date_default_timezone_set('America/New_York');
    		echo $timestamp = date('h:i:s');
        ?>
        </div>
      </div>
      <div></div>
      <div></div>
      <div class="Week"><a href="#">Week1</a></div>
      <div class="Week"><a href="#">Week2</a></div>
      <div class="Week"><a href="#">Week3</a></div>
      <div class="Week"><a href="#">Week4</a></div>
      <div class="Week"><a href="#">Week5</a></div>
      <div class="Week"><a href="#">Week6</a></div>
      <div class="Week"><a href="#">Week7</a></div>
      <div class="Week"><a href="#">Week8</a></div>
      <div class="Week"><a href="#">Week9</a></div>
      <div class="Week"><a href="#">Week10</a></div>
      <div class="Week"><a href="#">Week11</a></div>
      <div class="Week"><a href="#">Week12</a></div>
      <div class="Week"><a href="#">Week13</a></div>
      <div class="Week"><a href="#">Week14</a></div>
    </div>
  </body>
</html>
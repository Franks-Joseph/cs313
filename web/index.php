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
        <p>I like tinkering with tech and coming up with new ideas.</p>
        <p>I like to get into video games but I like the computers that you can build to run them. I really like the hardware that is behind all of that.</p>
      </div>
      <div class="pic-container">
        <img src="https://www.w3schools.com/images/w3schools_green.jpg" alt="W3Schools.com" style="width:104px;height:142px;">
      </div>
      <div class="server-timer-container">
        <?php
          	date_default_timezone_set('America/New_York');
    		echo $timestamp = date('H:i:s');
        ?>
        <div id="timestamp"></div>
      </div>
    </div>
  </body>
</html>
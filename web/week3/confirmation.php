<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Confirmation</title>
  </head>
  <body>
    <?php
      #(PHP 4, PHP 5, PHP 7)
      #htmlspecialchars — Convert special characters to HTML entities
      $name = htmlspecialchars($_POST["name"]);
      $email = htmlspecialchars($_POST["email"]);
      $address = htmlspecialchars($_POST["address"]);
      $city = htmlspecialchars($_POST["city"]);
      $state = htmlspecialchars($_POST["state"]);
      $zip = htmlspecialchars($_POST["zip"]);
    ?>
    <h2>Confirmation</h2>
    <hr>
    <h3>Your Information</h3>
    <hr>
    <p>Name: <?=$name ?></p>
    <p>Email: <?=$email ?></p>
    <hr>
    <br>
    <h3>Your Shipping Information</h3>
    <hr>
    <p>Address: <?=$address ?></p>
    <p>City: <?=$city ?></p>
    <p>State: <?=$state ?></p>
    <p>Zip: <?=$zip ?></p>
    <hr>
    <br>
    <h3>Your items</h3>
    <hr>
    <?php

     ?>
  </body>
</html>

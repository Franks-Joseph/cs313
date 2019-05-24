<?php
# For more information, go here.
# https://content.byui.edu/file/14882098-ce1f-44ba-a196-a7aebcb3d5ce/1/week05/prepare-php-query.html

# This will be a php file for just connecting to a database in heroku.
# This will be in a function so that it can be reused in other php files.
public function connect_db()
{
  $db = NULL;

  try
  {
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
  return $db;
}
 ?>

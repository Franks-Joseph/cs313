<?php
include_once('link.php');
 ?>

<?php
// When the user clicks "Sign in"
// $email = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_STRING);
// $password = filter_input(INPUT_POST, 'inputPassword', FILTER_SANITIZE_STRING);

$email =  $_POST['inputEmail'];
$password =  $_POST['inputPassword'];

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (isset ($email) || $email == "" || !isset($password) || $password == "")
  {
      header('Location: register.php');
      die();
  }
  else
  {
      echo '<p>Error, try again!</p>';
  }
}

// Email
$email = htmlspecialchars($email);

// Hashed Password
$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

//Connect to db
require 'connect_db.php';
$db = connect_db();

// Insert the values into the table
$sql = 'INSERT INTO user(email, password)
        VALUES (:email, :password)';

// Prepare, Bind, and Execute
$stmt = $db->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $password);
$stmt-> execute();

header("Location: signIn.php");
die();

// This is done.
?>

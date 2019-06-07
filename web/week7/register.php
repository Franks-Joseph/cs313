<?php
require 'connect_db.php';
$db = connect_db();

//Client Side
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)
$password_clearText = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset ($password_clearText)
  && isset($username)) {
    $rows = regClient($email, $password_clearText);

    if ($row > 0)
    {
      header('Location: login.php');
      die();
    }
    else {
      echo '<p>Error, try again!</p>';
    }
  }
}



function regClient($email, $password_clearText) {
  $sql = 'INSERT INTO user (email, password)
          VALUES (:email, :password)';

  // Server Side
  $email = test_input($email);
  $password_clearText = test_input($password_clearText);

  $password = password_hash($password_clearText, PASSWORD_DEFAULT);

  $stmt = $needfunctionname->prepare($sql);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  $stmt->bindValue(':password', $password, PDO::PARAM_STR);

  $stmt-> execute();

  // See if the rows changed
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

?>

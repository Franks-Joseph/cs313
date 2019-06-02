<?php
require 'connect_db.php';
$db = connect_db();

$email = $password = $pwd = '';


$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$statement = $db->prepare("INSERT INTO user (Email,Password) VALUES ('$email','$password')");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  if($row)
  {
  	header("Location: login.php");
  }
  else
  {
  	echo "Error :".$statement;
  }
}
?>

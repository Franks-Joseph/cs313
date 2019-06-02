<?php
require 'connect_db.php';
$db = connect_db();

$email = $password = $pwd = '';


$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$sql = "INSERT INTO user (Email,Password) VALUES ('$email','$password')";
$result = pg_query($db, $sql);
if($result)
{
	header("Location: login.php");
}
else
{
	echo "Error :".$sql;
}
?>

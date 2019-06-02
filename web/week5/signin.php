<?php
require 'connect_db.php';
$db = connect_db();

$email = $password = $pwd = '';

$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$statement = $db->prepare("SELECT * FROM user WHERE email='$email' AND password='$password'");
$statement->execute();
	while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		$id = $row["id"];
		$email = $row["email"];
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $email;
	}
	header("Location: cart_test.php");
?>

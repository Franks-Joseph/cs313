<?php
require 'connect_db.php';
$db = connect_db();

$email = $password = $pwd = '';

$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$statement = $db->prepare("SELECT * FROM user WHERE Email='$email' AND Password='$password'");
$statement->execute();
	while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		$id = $row["ID"];
		$email = $row["Email"];
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $email;
	}
	header("Location: cart_test.php");
?>

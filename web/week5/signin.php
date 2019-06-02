<?php
require 'connect_db.php';
$db = connect_db();

$email = $password = $pwd = '';

$email = $_POST['Email'];
$pwd = $_POST['Password'];
$password = MD5($pwd);

$statement = $db->prepare("SELECT * FROM user WHERE Email='$email' AND Password='$password'");
$statement->execute();
	while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		$id = $row["id"];
		$email = $row["Email"];
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['Email'] = $email;
	}
	header("Location: cart_test.php");
?>

<?php
include_once('link.php');
 ?>

<?php
session_start();

$invalidLogin = false;

if (isset($_POST['inputEmail']) && isset($_POST['inputPassword']))
{
	$email = $_POST['inputEmail'];
	$password = $_POST['inputPassword'];

	require 'connect_db.php';
	$db = connect_db();

	$statement = $db->prepare("SELECT * FROM public.user WHERE email='$email' AND password='$password'");
	$statement->execute();
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			$id = $row["id"];
			$email = $row["email"];
			$hashedPwd = $row["password"];

			if (password_verify($password, $hashedPwd))
			{
				$_SESSION['email'] = $email;
				header("Location: cart_test.php");
				die();
			}
			else
			{
				$invalidLogin = true;
			}

		}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sign In</title>
	</head>
	<body class="text-center">
			<?php
			if ($invalidLogin)
			{
				echo "Invalid login credentials...<br><br>\n";
			}
			 ?>
			 <br>
			 <form method="POST" class="form-signin" action="signin.php">

			   <!--<img class="mb-4" src="<?php //echo "./" + $product['logo icon']; ?>" alt="" width="72" height="72"> -->

			 	<h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>

			 	<label for="inputEmail" class="sr-only">Email</label>

			 	<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>

			 	<label for="inputPassword" class="sr-only">Password</label>

			 	<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

			 	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
			 </form>
			 <br>
			 <br>
	</body>
</html>

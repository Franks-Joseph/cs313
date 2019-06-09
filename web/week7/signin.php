<?php
include_once('link.php');
 ?>

<?php
session_start();
//echo "session started <br>";
$invalidLogin = false;

if (isset($_POST['inputEmail']) && isset($_POST['inputPassword']))
{
	$email = $_POST['inputEmail'];
	$password = $_POST['inputPassword'];
//	echo "email and password is submitted <br>";

	require 'connect_db.php';
	$db = connect_db();
//	echo "database is connected <br>";

	$statement = $db->prepare("SELECT password FROM public.user WHERE email= :email");
	$statement->bindValue(':email', $email);
	$statement->execute();
//	echo "stmt executed <br>";
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
//			echo "fetch() worked <br>";
			$hashedPwd = $row["password"];
			header("Location: cart_test.php");

//			print_r($hashedPwd); // This isn't printing for some reason.

			/* echo stops here, don't know why this isn't working. There are no errors in heroku logs, console, or in error_reporting().
			if (password_verify($password, $hashedPwd))
			{
				$_SESSION['email'] = $email;
				header("Location: cart_test.php");
				die();
				echo "password should be verified and redirection should work. <br>";
			}
			else
			{
				$invalidLogin = true; // This is the only part that works
			}
			*/

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
				$alert = "Invalid Login Credentials..."
				echo "<script type='text/javascript'>alert('$alert');</script>";
			}
			 ?>
			 <br>
			 <form method="POST" class="form-signin" action="signin.php">

			   <!--<img class="mb-4" src="<?php //echo "./" + $product['logo icon']; ?>" alt="" width="72" height="72"> -->

			 	<h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1>

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

<?php
include_once('link.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body class="text-center">
<form method="POST" class="form-signin" action="register.php">

  <!--<img class="mb-4" src="<?php //echo "./" + $product['logo icon']; ?>" alt="" width="72" height="72"> -->

	<h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>

	<label for="inputEmail" class="sr-only">Email</label>

	<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>

	<label for="inputPassword" class="sr-only">Password</label>

	<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
</body>

<!-- This should be done. -->

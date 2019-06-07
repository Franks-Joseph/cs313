<?php
include_once('header.php');
include_once('link.php');
?>

<body class="text-center">
<form method="POST" class="form-signin" action="login.php">
  <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
	<h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
	<div class="form-group">
    <label for="inputEmail" class="sr-only">Email</label>
    <div class="col-sm-6">
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="sr-only">Password</label>
    <div class="col-sm-6">
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </div>
  </div>
</form>
</body>

<?php
include_once('header.php');
include_once('link.php');
 ?>

<div class="container login-container">
    <div class="row">
      <div class="col-md-6 login-form-1">
        <h1>User Login</h1>                                 //signin.php
        <form class="form-horizontal" method="POST" action="cart_test.php"> //This needs to be fixed as well. Probably the same issues.

          <div class="form-group"> <!-- Email -->
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-6">
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
          </div>

          <div class="form-group"> <!-- Password -->
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
            </div>
          </div>

          <div class="form-group"> <!-- Login -->
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
          </div>

          <div class="form-group"> <!-- Forget Password? -->
            <a href="#" class="ForgetPwd">Forget Password?</a>
          </div>

        </form>
      </div>
    </div>
</div>

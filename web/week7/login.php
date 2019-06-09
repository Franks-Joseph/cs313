<?php
include_once('header.php');
include_once('link.php');

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password_clearText = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);


function verify_login($password))
{
  //$db = dbconnect();
  $sql = 'SELECT password FROM user WHERE email = :email LIMIT 1';
  $stmt->bindValue(':email', $email);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_NUM);
  $stmt->closeCursor();

  echo 'SQL Results Fetched <br />';
  if (!is_array($results))
  {
    return 0;
  }
  else {

    print_r($results);
    $username = $result[0]['username'];
    $db_password = $results[0]['password'];

    if(password_verify($password, $db_password)) {

      $_SESSION['username'] = $username;
      $_SESSION['loggedin'] = TRUE;

      header('Location: welcome.php');
      die();
    }
    else {
      echo '<p class="err"> Error, login failed!</p>';
    }
  }
}
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

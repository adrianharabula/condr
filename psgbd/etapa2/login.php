<?php
require('autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

$loginResult = 0;
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

if(isset($_REQUEST['submitLogin']))
{
  if(isset($email) && isset($password))
  {
    $db->query('select "password" from users where email=:p1')
       ->bind(':p1', $email)
       ->execute();
    $loginResult = password_verify($password, $db->firstResult()->password);

    // log in the user on valid credentials
    if($loginResult) $_SESSION['username'] = $email;
  }
}

$pageTitle = "Login";
require('Parts/header.php');
require('Parts/headerMenu.php');
?>

<div class="container">
  <div class="row page black">

    <?php if ($_REQUEST['submitLogin']): ?>
    <div class="col-md-4 col-md-offset-4">
      <?php if ($loginResult): ?>
        <div class="panel panel-success">
        	<div class="panel-heading">Login succesful!</div>
        </div>
      <?php else: ?>
        <div class="panel panel-danger">
    			<div class="panel-heading">Login error!</div>
        </div>
      <? endif; ?>
    </div>
    <?php endif; ?>

    <?php if(!isset($_SESSION['username'])) : ?>
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-info">
        <div class="panel-heading">Log in</div>
        <div class="panel-body">
          <form role="form" action="login.php" method="post">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Enter your email" name="email" type="email" autofocus="">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              </div>
              <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="Remember Me">Remember Me
                </label>
              </div>
              <input name="submitLogin" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown" type="submit" value="Log in">
            </fieldset>
          </form>
        </div>
      </div>
    </div><!-- /.col-->
    <?php endif; ?>
  </div><!-- /.row -->
</div>

<?php require('Parts/footer.php'); ?>

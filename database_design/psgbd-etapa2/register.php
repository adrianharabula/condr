<?php
require('autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

$registerResult = 0;
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];

if(isset($_REQUEST['submitRegister']))
{
  if (empty($_REQUEST['username']) || empty($_REQUEST['password']) || empty($_REQUEST['email'])) {
    exit("Please fill all fields!");
  }

  if(isset($username) && isset($password) && isset($email))
  {
    $db->query("begin :ret :=user_manager.register(:p1,:p2,:p3); end;");
    $db->bind(':p1', $username);
    $db->bind(':p2', $password);
    $db->bind(':p3', $email);
    $db->bind(':ret', $registerResult, 10);
    $db->execute();

    // log in the user on valid credentials
    if($registerResult) $_SESSION['username'] = $username;
  }
}

$pageTitle = "Register";
require('Parts/header.php');
require('Parts/headerMenu.php');
?>

<?php if ($_REQUEST['submitRegister']): ?>
  <div class="row">
		<div class="col-md-4 col-md-offset-4">
      <?php if ($registerResult): ?>
        <div class="panel panel-success">
        	<div class="panel-heading">Register succesful!</div>
        </div>
      <?php else: ?>
        <div class="panel panel-danger">
  				<div class="panel-heading">Register error!</div>
        </div>
      <? endif; ?>
    </div>
  </div>
<?php endif; ?>

<?php if(!isset($_SESSION['username'])) : ?>
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">Register </div>
        <div class="panel-body">
          <form role="form" action="register.php" method="post">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Choose your username" name="username" type="username" autofocus="">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="E-mail address" name="email" type="email" autofocus="">
              </div>
              <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="Remember Me">Remember Me
                </label>
              </div>
              <input name="submitRegister" class="btn btn-primary" type="submit" value="Register!">
            </fieldset>
          </form>
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- /.row -->

<?php endif; ?>

<?php require('Parts/footer.php'); ?>

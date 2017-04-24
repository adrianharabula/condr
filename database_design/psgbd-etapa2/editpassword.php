<?php
require('autoload.php');


$db = new Database\Database;
$utils = new Utils\Utils;


$verifyResult = 0;
$allfields = 0;
$equals = 0;
$changeResult = 0;
$username = $_SESSION['username'];
$password = $_REQUEST['oldpass'];
$newpass = $_REQUEST['newpass'];
$newpass2 = $_REQUEST['newpass2'];

if(isset($_REQUEST['submitPassword']))
{
  if (empty($_REQUEST['oldpass']) || empty($_REQUEST['newpass']) || empty($_REQUEST['newpass2']))
  {
    $allfields = 1;
  }

  if(isset($password) && isset($newpass) && isset($newpass2))
  {
    $db->query("select count(*) as NR from users where username=:p1 and password=:p2");
    $db->bind(':p1', $username);
    $db->bind(':p2', $password);
    $db->execute();
    $verifyResult = $db->firstResult()->NR;

    	if($verifyResult && ($newpass == $newpass2))
    		{
          $equals = 1;
    			$db->query("begin :ret :=user_manager.update_user(:u1,:u2); end;");
    			$db->bind(':u1', $username);
       		$db->bind(':u2', $newpass);
			    $db->bind(':ret', $changeResult, 10);
			    $db->execute();
    		}

  }
}


$pageTitle = "Change Password";

require('Parts/header.php');
require('Parts/headerMenu.php');
?>


<?php if ($_REQUEST['submitPassword']): ?>
  <div class="row">
	<div class="col-md-4 col-md-offset-4">

      <?php if ($allfields): ?>
        <div class="panel panel-danger">
          <div class="panel-heading">Please fill all fields!</div>
        </div>

      <?php elseif (!$verifyResult): ?>
        <div class="panel panel-danger">
          <div class="panel-heading">The current password is not correct!</div>
        </div>


      <?php elseif ($changeResult): ?>
        <div class="panel panel-success">
          <div class="panel-heading">Password changed successfully!</div>
        </div>

      <?php elseif (!$equals): ?>
        <div class="panel panel-danger">
  				<div class="panel-heading">The new password doesn't match!!</div>
        </div>

      <? endif; ?>

    </div>
  </div>
<?php endif; ?>


  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading"><b>Edit password </b></div>
        <div class="panel-body">
          <form role="form" action="editpassword.php" method="post">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Type the current password" name="oldpass" type="password" >
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Type the new password" name="newpass" type="password">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Retype the new password" name="newpass2" type="password" >
              </div>
              <input name="submitPassword" class="btn btn-primary my-btn" type="submit" value="Change">
            </fieldset>
          </form>
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- /.row -->

<?php require('Parts/footer.php'); ?>

<?php
require('autoload.php');
require('Parts/header.php');



$db = new Database\Database;
$utils = new Utils\Utils;

$username = $_SESSION['username'];

$db->query("SELECT * FROM USERS WHERE username = :u" );
$db->bind(":u", $username);
$details = $db->execute()->result();

?>


<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading"><b>Details</b></div>
        <div class="panel-body">
            <fieldset>
              <?php foreach($details as $user) : ?>
                  <div class="form-group">
                      <div class="form-group">
                         <p><span style="color:green"><b>Username : </b></span><?=$user->USERNAME?></p> 
                      </div>
                      <div class="form-group">
                         <p><span style="color:green"><b>Email : </b></span><?=$user->EMAIL?> </p>
                      </div>
                  </div>
              <?php endforeach ?>
              <div class="col-md-2"><a href="editpassword.php" class="btn btn-primary my-btn">Edit Password</a></div>
            </fieldset>
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- /.row -->


<?php require('Parts/footer.php'); ?>

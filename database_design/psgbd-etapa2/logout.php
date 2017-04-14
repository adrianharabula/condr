<?php
require('autoload.php');

$pageTitle = "Log Out";
require('Parts/header.php');
?>

  <div class="row">
		<div class="col-md-4 col-md-offset-4">
        <div class="panel panel-success">
        	<div class="panel-heading">Logout succesful!</div>
        </div>
    </div>
  </div>

<?php require('Parts/footer.php'); ?>

<?php
session_destroy();

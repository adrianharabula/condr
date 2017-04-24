<?php
require('autoload.php');


$pageTitle = "My preferences";
$bodyClass = "bg-black black";
require('Parts/header.php');
require('Parts/headerMenu.php');

?>

<div class="row">
	<div class="col-md-4 col-md-offset-4">

	<div class="panel panel-success">
          <div class="panel-heading">Deleted successfully!</div>
    </div>
</div>
</div>
<style>
.panel-success {
		margin-top: 30px;
    margin-left:20px;
    margin-right:20px;
}
.panel-heading {
  text-align: center;
}
</style>

<?php require('Parts/footer.php'); ?>

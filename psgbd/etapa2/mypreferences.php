<?php
require('autoload.php');

$pageTitle = "My preferences";
$bodyClass = "bg-black black";

require('Parts/header.php');
require('Parts/headerMenu.php');
?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
  	<div class="panel">

	    <div class="panel-heading">
	      <h4>Change/Update your preferences</h4>
	    </div>

	      <div class="panel-body">


	      <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-0">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
									<td class="col-md-6 col-md-offset-2">
                                            <h5><b>Color : </b><span>Blue</span></h5>
                                            <h5><b>Dimension : </b><span>15 inch</span></h5>
                                            <h5><b>Battery : </b><span>good</span></h5>
                                    </td>
				                    <td class="col-md-0">
				                                <div class="col-md-offset-2">
				                                   <br><a href="delete.php" style="color:green"><b><h5>Delete</h5></b></a>
				                                </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
									<td class="col-md-6 col-md-offset-2">
                                            <h5><b>Color : </b><span>Red</span></h5>
                                            <h5><b>Heels : </b><span>High</span></h5>
                                            <h5><b>Type : </b><span>stilleto</span></h5>
                                    </td>
				                    <td class="col-md-0">
				                                <div class="col-md-offset-2">
				                                   <br><a href="delete.php" style="color:green"><b><h5>Delete</h5></b></a>
				                                </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
									<td class="col-md-6 col-md-offset-2">
                                            <h5><b>Processor : </b><span>2.7GHz</span></h5>
                                            <h5><b>Dimension : </b><span>15 inch</span></h5>
                                            <h5><b>Battery : </b><span>good</span></h5>
                                    </td>
				                    <td class="col-md-0">
				                                <div class="col-md-offset-2">
				                                   <br><a href="delete.php" style="color:green"><b><h5>Delete</h5></b></a>
				                                </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

</div>
</div>
</div>
</div>




<?php require('Parts/footer.php'); ?>

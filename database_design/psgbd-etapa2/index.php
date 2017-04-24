<?php
require('autoload.php');

$pageTitle = "Welcome Page";
require('Parts/header.php');
require('Parts/headerMenu.php');
?>

<div id="tf-home">
    <div class="overlay">
        <div id="sticky-anchor"></div>
        <div class="container">
            <div class="content lets-start">
                <h3 id="main-logo">Looking to buy something today?</h3>
                <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <input type="text" class="form-control" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <a href="products.php" class="btn btn-primary my-btn btn-start my-btn-dropdown">Get characteristics</a>
                    <?=!isset($_SESSION['username'])? "<a href='login.php' class='btn btn-primary my-btn2'>Login</a>":""?>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="tf-service" class="bg-maroon aqua">
    <div class="container">

        <div class="col-md-4">
            <div class="media">
              <div class="media-left media-middle">
                <i class="fa fa-users fa-fw"></i>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Join groups</h3>
                <p>Groups are a great way to get behind the causes you care about.</p>
              </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="media">
              <div class="media-left media-middle">
                <i class="fa fa-bolt fa-fw"></i>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Shop Smart</h3>
                <p>Scan barcodes when shopping to learn product history & make an informed decision</p>
              </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="media">
              <div class="media-left media-middle">
                <i class="fa fa-volume-up fa-fw"></i>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Speak up</h3>
                <p>Get your message across by notifying the product owners of your decision</p>
              </div>
            </div>
        </div>

    </div>
</div>

<?php require('Parts/footer.php'); ?>

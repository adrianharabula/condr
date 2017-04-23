<?php
require('autoload.php');

$pageTitle = "About";
require('Parts/header.php');
require('Parts/headerMenu.php');
?>

<section class="container-fluid" id="section1"><br><br>
    <h1 class="text-center v-center">Why this application?</h1>
    <div class="container">
      <div class="row">
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-10 col-sm-offset-2 text-center"><h3>Complex</h3><p>Our application can offer great support when it comes to making decisions not only for the large database that stands beside it, but also for statistics and opinions taken from other users.</p><i class="fa fa-cog fa-5x"></i></div>
            </div>
          </div>
          <div class="col-sm-4 text-center">
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1 text-center"><h3>Simple</h3><p>The use of this application is very easy and can be done by anybody with just a few clicks.</p><i class="fa fa-user fa-5x"></i></div>
            </div>
          </div>
          <div class="col-sm-4 text-center">
            <div class="row">
              <div class="col-sm-10 text-center"><h3>Adaptable</h3><p>The application is web responsive, which means that you can use it very easily from your tablet, phone, laptop or any other device that has a screen incorporated.</p><i class="fa fa-mobile fa-5x"></i></div>
            </div>
          </div>
      </div><!--/row-->
    <div class="row"></div>
  </div><!--/container-->
</section>

<section class="container-fluid" id="section2">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
        <h1>How it works?</h1><br>
    <p class="lead">When you first come on our website, you must register in order to use the application because it is mainly based on statistics that other users provide. By doing this, we can help further more users to receive the best advices, as you did. After registering, you will be able to fill a form regarding your (un)desirable preferences, selected by choice, from a pre-made list of choices or a self-made one. The application receives the data you entered and searches for the best option in the given case and recommands you the product you need. Pay attention to the way you introduce your own preferences in order to get the best results! The application only recognises pairs of nouns and attributes separates by semicolon and space, so be careful!</p>
    </div>
  </div>
</section>


<section class="container-fluid" id="section3">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
        <h1>Other features...</h1><br>
    <p class="lead">The application also alows a group or people joining the same group and receive advices for purchasing services/goods taking into account every one's opinion and preferences. The connected users can also have access to the statistics made by that moment about the most (un)desired product, the user with the maniest/fewest preferences and so on.</p>
    </div>
  </div>
</section>
<div class="content content-nopad">
<a href="register.php" class="btn btn-primary my-btn">Let's get started!</a>
</div>

<style>
.container-fluid {
  background-color: white;
}
<?php require('Parts/footer.php'); ?>

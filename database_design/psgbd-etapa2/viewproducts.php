<?php
require('autoload.php');

$pageTitle = "Product details!";
require('Parts/header.php');
require('Parts/headerMenu.php');
?>
<link href="/Assets/css/products.css" rel="stylesheet">

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Details about the selected product...</h4>
    </div>

    <div class="col-md-2">
      <a class="thumbnail pull-left" href="#"> <img class="media-object" src="/Assets/img/Product-Icon.png" style=""> </a>
    </div>
    <div class="panel-body">
      <div class="col-md-3">
        <h4>Product name: Iphone 4S</h4>
        <h5> by Apple </h5>
        <h4>Product category</h4>
        <h5>Electronics</h5>
        <h4>Characteristics of the product:</h4>
        <h5>Color: white</h5>
        <h5>Processor: 1.1GHz</h5>
        <h5>Display: 5 inches</h5>
        <h5>Operating system: OSX</h5>
        <h5>Charging time: <1h</h5>
      </div>

    </div>
  </div>
</div>

<?php require('Parts/footer.php'); ?>

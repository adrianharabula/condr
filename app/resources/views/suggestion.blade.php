@extends('layouts.app')

@section('title', 'Suggestions')

@section('content')

  <div class="container">
    <div class="row page black">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h1>Our suggestion...</h1>
        </div>

        <div class="panel-body">
          <div class="col-md-3">
            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="/Assets/img/Product-Icon.png" style=""> </a>
          </div>
          <div class="col-md-9">
            <h4>The product you searched</h4>
            <h5>IPHONE 5S</h5><br>

            <h4>The characteristics you wanted:</h4>
            <h5><b>Color : </b><span>white</span></h5>
            <h5><b>Dimension : </b><span>7 inch</span></h5>
            <h5><b>Battery : </b><span>20A</span></h5><br>

            <h4>The characteristics you didn't want:</h4>
            <h5><b>Processor : </b><span>1.7GHz</span></h5>
            <h5><b>Waranty : </b><span>no</span></h5><br>

            <h4>The characteristics of the product we found in our database:</h4>
            <h5><b>Processor : </b><span>2.3GHz</span></h5>
            <h5><b>Waranty : </b><span>yes</span></h5>
            <h5><b>Color : </b><span>black</span></h5>
            <h5><b>Battery : </b><span>20A</span></h5><br>

            <h4>Taking into account all the data, our suggestion would be to...<b style="color:green;">BUY THE PRODUCT!</b></h4>
            <h5><b>The product matches 98% of your preferences!</h5>

            <h4 style="margin-top:50px;">If you decide to <i>not</i> to buy this product, then you should try our following <i>similar</i> products...</h4><br>
            <h5><b>IPHONE 6S</b> - The product matches 97% of your preferences!</h5>
            <h5><b>IPHONE 7</b> - The product matches 93% of your preferences!</h5>
            <h5><b>IPHONE 4</b> - The product matches 88% of your preferences!</h5>
            <a href="products.php" class="btn btn-primary my-btn btn-start my-btn-dropdown">View the suggested products!</a>

          </div>

        </div>
      </div>
    </div>
  </div>
  <style>
  .panel-heading {
    text-align: center;
  }
  </style>

@endsection

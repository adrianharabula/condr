<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$pageTitle?></title>
		<link href="/Assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="/Assets/css/datepicker3.css" rel="stylesheet">
		<link href="/Assets/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"  href="/Assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Assets/fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css"  href="/Assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Assets/css/responsive.css">
    <script type="text/javascript" src="/Assets/js/modernizr.custom.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

  </head>
  <body background="/Assets/img/bp_background_2_blue1.jpg">
    <div id="tf-home">
        <div class="overlay">
            <div id="sticky-anchor"></div>
            <nav id="tf-menu" class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand logo" href="index.php">Consumer Decision Maker</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="index.html">Home</a></li> -->
                        <!-- <li><a href="about.html">About</a></li> -->
                        <li><a href="products.php">Pagination</a></li>
                        <li><?=isset($_SESSION['username'])? "<a href='logout.php'>Log Out</a>":"<a href='login.php'>Log In</a>"?></li>
                        <?=!isset($_SESSION['username'])? "<li><a href='register.php'>Register</a></li>":""?>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
    <br />

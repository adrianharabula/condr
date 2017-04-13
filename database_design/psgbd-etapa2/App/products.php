<?php
require('../autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

// set default values for page and perPage
$page = empty($_REQUEST['page']) ? 1 : $_REQUEST['page'];
$perPage = empty($_REQUEST['perPage']) ? 5 : $_REQUEST['perPage'];

// count products from database
$nrProducts = $db->query("select count(*) as nr from PRODUCTS")
                  ->execute()
                  ->result()
                  [0]->NR;

// cout total pages number
$nrPages = $nrProducts / $perPage;

// if out of bound return error
if ($page > $nrPages) exit('Invalid page!');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <body background="img/bp_background_2_blue1.jpg">

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
                      <a class="navbar-brand logo" href="index.html">Consumer Decision Maker</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="statistics.html">Statistics</a></li>
                        <li><a href="forms.html">Preferences</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="login.html">Login In</a></li>
                        <li><a href="register.html">Register</a></li>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>

<?php

  // Show paginated result
  $db->query("SELECT * FROM (SELECT a.*, ROW_NUMBER() OVER (ORDER BY product_id asc) AS rnum FROM products a) WHERE rnum BETWEEN :p1 AND :p2" );
  $db->bind(":p1", $perPage * ($page - 1) + 1);
  $db->bind(":p2", $perPage * $page);
  $result = $db->execute()->result();
?>

    <br />

    <div class="row">
      <div class="col-md-4 col-md-offset-4 ">

        <h1>Paginatd List Products</h1>

        <div class="list-group">
          <?php
            foreach($result as $obj) {
              echo '<a href="#" class="list-group-item">' . $obj->NAME . ' <span class="badge">' . $obj->PRODUCT_ID . '</span></a>';
            }
          ?>
        </div>

        <nav aria-label="Product navigation" class="text-center">
          <ul class="pagination">
            <li class="page-item <?=($page == 1)?'hidden':'';?>">
              <a class="page-link" href="products.php" tabindex="-1">First</a>
            </li>
            <li class="page-item <?=($page == 1)?'hidden':'';?>">
              <a class="page-link" href="products.php?page=<?=$page-1?>&perPage=<?=$perPage?>" tabindex="-1">Previous</a>
            </li>
            <li class="page-item <?=($page == 1)?'hidden':'';?>"><a class="page-link" href="products.php?page=<?=$page-1?>&perPage=<?=$perPage?>"><?=$page-1?></a></li>
            <li class="page-item active"><a class="page-link" href="products.php?page=<?=$page?>&perPage=<?=$perPage?>"><?=$page?></a></li>
            <li class="page-item <?=($page == $nrPages)?'hidden':'';?>"><a class="page-link" href="products.php?page=<?=$page+1?>&perPage=<?=$perPage?>"><?=$page+1?></a></li>
            <li class="page-item <?=($page == $nrPages)?'hidden':'';?>">
              <a class="page-link" href="products.php?page=<?=$page+1?>&perPage=<?=$perPage?>" tabindex="-1">Next</a>
            </li>
            <li class="page-item <?=($page == $nrPages)?'hidden':'';?>">
              <a class="page-link" href="products.php?page=<?=$nrPages?>&perPage=<?=$perPage?>">Last</a>
            </li>
          </ul>
        </nav>
    </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="/Assets/js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="/Assets/js/bootstrap.js"></script>
  </body>
</html>

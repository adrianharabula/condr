<?php
require('../autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

// set default values for page and perPage
$page = empty($_REQUEST['page']) ? 1 : $_REQUEST['page'];
$perPage = empty($_REQUEST['perPage']) ? 7 : $_REQUEST['perPage'];

// count products from database
$nrProducts = $db->query("select count(*) as nr from PRODUCTS")
                  ->execute()
                  ->firstResult()
                  ->NR;

// cout total pages number
$nrPages = ceil($nrProducts / $perPage);

// if out of bound return error
if ($page > $nrPages) exit('Invalid page!');

/*
 * Pagination code
 */
$firstIndex = $perPage * ($page - 1) + 1;
$lastIndex = $perPage * $page;

// Load paginated entries into $paginatedEntries
$db->query("SELECT * FROM (SELECT a.*, ROW_NUMBER() OVER (ORDER BY product_id asc) AS rnum FROM products a) WHERE rnum BETWEEN :p1 AND :p2" );
$db->bind(":p1", $firstIndex);
$db->bind(":p2", $lastIndex);
$paginatedEntries = $db->execute()->result();

$pageTitle = "Paginaţie produse";
require('../Parts/header.php');
?>
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

    <br />

    <div class="row">
      <div class="col-md-6 col-md-offset-3 ">
        <h2 style="color: white;">Paginated Products</h2> <br />
        <div class="list-group">
          <?php
            foreach($paginatedEntries as $item) {
              echo '<a href="#" class="list-group-item">' . $item->NAME . ' <span class="badge">' . $item->PRODUCT_ID . '</span></a>';
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
<?php require('../Parts/footer.php'); ?>

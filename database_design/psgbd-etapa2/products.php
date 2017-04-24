<?php
  require('autoload.php');
  $db = new Database\Database;
  $utils = new Utils\Utils;
  // set default values for page and perPage
  $page = empty($_REQUEST['page']) ? 1 : $_REQUEST['page'];
  $perPage = empty($_REQUEST['perPage']) ? 5 : $_REQUEST['perPage'];
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
  // Load results into $paginatedEntries
  $db->query("SELECT * FROM (SELECT a.*, ROW_NUMBER() OVER (ORDER BY product_id asc) AS rnum FROM products a) WHERE rnum BETWEEN :p1 AND :p2");
  $db->bind(":p1", $firstIndex);
  $db->bind(":p2", $lastIndex);
  $paginatedEntries = $db->execute()->result();
  $pageTitle = "Products list";
  require('Parts/header.php');
  require('Parts/headerMenu.php');
  ?>

  <link href="/Assets/css/products.css" rel="stylesheet">

  <div class="container page white">
    <div class="row">
      <div class="col-md-12 text-center">
          <h2>A few products...</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-push-8 col-md-4 black">
        <div class="panel panel-info">
          <div class="panel-heading">Advanced Search</div>
          <div class="panel-body">
            <div class="row">
              <form class="form">
                <div class="form-group col-md-12">
                  <input type="text" class="form-control full-width" id="name" placeholder="Enter keywords">
                </div>
                <div class="form-group col-md-12">
                  <b>Filter by</b>: <br/>
                  <label class="radio-inline"><input type="radio" name="optradio" checked="checked">Name</label>
                  <label class="radio-inline"><input type="radio" name="optradio">Category</label>
                  <label class="radio-inline"><input type="radio" name="optradio">Company</label>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary my-btn btn-block">Search</button>
                  <br/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8 col-md-pull-4">
        <?php foreach($paginatedEntries as $item) : ?>
        <div class="row">
            <div class="col-md-9">
              <div class="media">
                  <a class="thumbnail pull-left" href="viewproduct.php"> <img class="media-object" src="/Assets/img/Product-Icon.png" style="width: 72px; height: 72px;"> </a>
                  <div class="media-body">
                      <h4 class="media-heading"><a href="viewproduct.php"><?=$item->NAME?></a></h4>
                      <h5 class="media-heading"> by <a href="viewproduct.php">The company that sells everything</a></h5>
                  </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href="viewproduct.php" class="btn btn-primary my-btn my-btn-dropdown btn-block btn-product pull-right">View details</a>
            </div>
        </div>
        <?php endforeach ?>

        <nav aria-label="Product navigation" class="text-center">
          <ul class="pagination">
            <li class="page-item <?=($page == 1)?'hidden':'';?> ">
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

    </div> <!--end row -->
  </div>

  <?php require('Parts/footer.php'); ?>

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

  <div class="row">
    <form class="form-inline">
      <div class="form-group">
        <input type="text" class="form-control" id="name" placeholder="Enter name">
      </div>
      <div class="form-group">
        <select class="form-control">
          <option value="">Filter by</option>
          <option value="name">Name</option>
          <option value="category">Category</option>
          <option value="company">Company</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary my-btn">Search</button>
    </form>
  </div>

  <div class="row maroon">
    <div class="col-md-6 col-md-offset-3 ">
        <h2>A few products...</h2><br>

        <?php
          foreach($paginatedEntries as $item) {
            echo '<div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <table class="table table-hover">
                            <thead>
                                <tr>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-sm-8 col-md-6 col-md-offset-2">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="/Assets/img/Product-Icon.png" style="width: 72px; height: 72px;"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">' . $item->NAME . '</a></h4>
                                            <h5 class="media-heading"> by <a href="#">The company that sells everything</a></h5>
                                        </div>
                                    </div></td>
                                    <td class="col-sm-1 col-md-1">
                                      <button type="button" class="btn btn-primary my-btn"><a href="viewproducts.php">View details</a>
                                      </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>';
          }
        ?>
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
  </div>

  <?php require('Parts/footer.php'); ?>

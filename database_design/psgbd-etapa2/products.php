<?php
require('autoload.php');
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
// Load results into $paginatedEntries
$db->query("SELECT * FROM (SELECT a.*, ROW_NUMBER() OVER (ORDER BY product_id asc) AS rnum FROM products a) WHERE rnum BETWEEN :p1 AND :p2");
$db->bind(":p1", $firstIndex);
$db->bind(":p2", $lastIndex);
$paginatedEntries = $db->execute()->result();
$pageTitle = "Products list";
require('Parts/header.php');
?>

<style>
input[type=text] {
    width: 95%;
    box-sizing: border-box;
    border: 2px solid #2F937B;
    border-radius: 0px;
    font-size: 17px;
    background-color: whitesmoke;
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 8px 10px 10px 10px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
form {
    text-align: left;
}
h2{
  color: white;
  text-align:center;
}
</style>

<div class="row">
  <div class="col-md-2 col-md-offset-3">
    <form>
      <input type="text" name="search" placeholder="Enter product here">
    </form>
  </div>

  <div class="col-md-2">
    <li class="dropdown">
      <a href="#" class="btn btn-xs btn-primary my-btn" style="margin: 1px;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filter by<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Name</a></li>
        <li><a href="#">Category</a></li>
        <li><a href="#">Company</a></li>
      </ul>
    </li>
  </div>

  <div class="col-md-2">
      <a href="#" class="btn btn-xs btn-primary my-btn" style="margin: 3px;" role="button">Search</a>
  </div>
</div>



<!--
<div class="col-md-4 col-md-offset-3">
  <div class="row">
    <div class="header_search">
      <div class="input-group">
          <div class="input-group-btn">
              <button type="button" class="btn btn-default dropdown-toggle search-button-style" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span id="active_search_type">Search by</span> <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li data-attr-type="Name" data-attr-name="Name" data-attr-placeholder="Search name"><a class="dropdown_item" href="#">Product name</a></li>
                <li data-attr-type="Company" data-attr-name="Company" data-attr-placeholder="Search company"><a class="dropdown_item" href="#">Product company</a></li>
                <li data-attr-type="Category" data-attr-name="Category" data-attr-placeholder="Search category"><a class="dropdown_item" href="#">Product category</a></li>
              </ul>
          </div>
      </div>
      <form id="nav_search_form" action="/search">
        <input type="text" name="term" class="form-control" id="nav_search" placeholder="Search products" value="" aria-label="...">
        <a href="#" id="nav_search_button"></a>
        <input type="hidden" id="search_type" name="type" value="product">
      </form>
    </div>
  </div>
</div>
-->


<br><br><br>
<div class="row">
  <div class="col-md-6 col-md-offset-3 ">
      <h2>A few products...</h2> <br />
      <div class="list-group">
        <?php
          foreach($paginatedEntries as $item) {
            echo '<a href="#" class="list-group-item">' . $item->NAME . ' <span class="badge">' . $item->PRODUCT_ID . '</span></a>';
          }
        ?>
      </div>
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

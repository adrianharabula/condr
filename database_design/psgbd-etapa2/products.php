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

  <form>
    <input type="text" name="search" placeholder="Search products by name">
  </form>

<div class="col-md-2 col-md-offset-4">
  <form role="form">
      <select class="form-control">
        <option>Select category</option>
        <option>Electronics</option>
        <option>Clothes</option>
        <option>Footwear</option>
        <option>Food</option>
        <option>Games</option>
        <option>Services</option>
        <option>Education</option>
        <option>Other</<option>
      </select>
    </div>
  </form>
</div>

<br><a href="register.php" class="btn btn-primary my-btn">Search</a>

<style>
input[type=text] {
    margin: 10px 0;
    width: 28%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 10px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 10px 40px 10px 10px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    margin-top:20px;
}
form {
    text-align: center;
}

h2{
  color: white;
  text-align:center;
}
</style>

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

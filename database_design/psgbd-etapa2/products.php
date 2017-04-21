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
  <input type="text" name="search" placeholder="Search product">
    <div class="form-options">
      <label for="filter" style="font-family: 'Playball', cursive; font-size: 20px;">Filter by:</label>
      <select class="form-control" id="filter">
        <option>Electronics</option>
        <option>Clothes</option>
        <option>Foot wear</option>
        <option>Food</option>
        <option>Games</option>
        <option>Services</option>
        <option>Education</option>
      </select>    
    </div>
  </form>

<style>  
input[type=text] {
    font-family: 'Playball', cursive;
    margin: 10px 0;
    width: 20%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 8px 8px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    margin-top:20px; 
}

.form-options{
  margin: 10px 0;
  padding: 8px 8px; 
  width: 20%;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 4px;
  border: 4px solid white;
  color: white;
  text-align: center;
  margin-left:60px;
}

select{
font-family: 'Playball', cursive;
font-size: 40 px;
}

form {
    text-align: center;
    }

input[type=text]:focus {
    width: 30%;
}

h2{
  font-family: 'Playball', cursive;
  color: white; 
  text-align:center;
}

.list-group-item{
  font-family: 'Playball', cursive;
  width: 700px;
  height: 40px;
  font-size: 20px;
}

.page-link{
 font-family: 'Playball', cursive;
}

</style>


<br>
<div class="row">
  <div class="col-md-6 col-md-offset-3 ">
      <h2>Products list</h2> <br />
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

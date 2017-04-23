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
  $db->query("SELECT * FROM (SELECT a.*, (select name from company c where c.record_id=a.company_id) as companyname, (select name from category ctg where ctg.category_id=a.category_id) as categoryname,ROW_NUMBER() OVER (ORDER BY product_id asc) AS rnum FROM products a) WHERE rnum BETWEEN :p1 AND :p2");
  $db->bind(":p1", $firstIndex);
  $db->bind(":p2", $lastIndex);
  $paginatedEntries = $db->execute()->result();
  $pageTitle = "Products list";
  require('Parts/header.php');
  ?>

  <link href="/Assets/css/products.css" rel="stylesheet">

  <br><br><br>
  
        <h2>Change/update your searched products</h2>

<div class="container center_div">
    <form class="form-inline">
      <div class="form-group">
        <input type="text" class="form-control" id="name" placeholder="Search product">
      </div>
      
      <button type="submit" class="btn btn-primary my-btn">Search</button>
    </form> <br>
  </div>
 <?php
foreach($paginatedEntries as $item) {
  echo '
    <div id="products" class="row">
        <div class="table_product">
            <div class="thumbnail">
                <img class="image" src="http://www.countylabels.com/wp-content/uploads/2014/06/Products.jpg" alt="" />
                <div class="caption">
                  <table class="products_list">
                    <tbody>
                       <tr>
                           <td>NAME:</td>
                           <td>'. $item->NAME .'</td>
                       </tr>
                       <tr>
                           <td>ID:</td>
                           <td>'. $item->PRODUCT_ID .'</td>
                       </tr>
                       <tr>
                           <td>CATEGORY:</td>
                           <td>'. $item->CATEGORYNAME .'</td>
                       </tr>
                       <tr>
                           <td>COMPANY:</td>
                           <td>'. $item->COMPANYNAME .'</td>
                       </tr>
                       <tr>
                           <td></td>
                       </tr>
                   </tbody> 
                  </table>
                  <div class="row">
                  <button id="principal-button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Delete</button>
 

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel" style="color:#333;">Delete product</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <div style="font-weight:bold; text-align:center;">Are you sure that you want to delete the selected product?</div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="buton" type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
        <button id="buton" type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
                  	
               	  </div>                                     
                </div>
            </div>
        </div>       
    </div>
</div>';
}
?>

<style type="text/css">
#principal-button{
  width: 60%;
  margin-left: 70px;
}
#principal-button:hover{
   background-color: #2e6da4;
    color: white;
}
.btn-default:hover{
 background-color: #2e6da4;
    color: #2F937B;
}

#buton{
  width: 30%;
  margin-right: 70px;
  margin-bottom: 20px;
  color: white;
}

#exampleModal{
  margin-top: 80px;
}

.table_product{
	width: 30%;
}
.btn{
	background-color: #2F937B;
}
td{
	font-weight: bold;
	padding: 8px;
}
#products{
	margin-left: 30%;
	width: 100%;
}
.image{
    padding: 5px;
    width: 65%;
    filter: grayscale(50%);

}


</style>

        <nav aria-label="Product navigation" class="text-center">
          <ul class="pagination">
            <li class="page-item <?=($page == 1)?'hidden':'';?> ">
              <a class="page-link" href="myproducts.php" tabindex="-1">First</a>
            </li>
            <li class="page-item <?=($page == 1)?'hidden':'';?>">
              <a class="page-link" href="myproducts.php?page=<?=$page-1?>&perPage=<?=$perPage?>" tabindex="-1">Previous</a>
            </li>
            <li class="page-item <?=($page == 1)?'hidden':'';?>"><a class="page-link" href="myproducts.php?page=<?=$page-1?>&perPage=<?=$perPage?>"><?=$page-1?></a></li>
            <li class="page-item active"><a class="page-link" href="products.php?page=<?=$page?>&perPage=<?=$perPage?>"><?=$page?></a></li>
            <li class="page-item <?=($page == $nrPages)?'hidden':'';?>"><a class="page-link" href="myproducts.php?page=<?=$page+1?>&perPage=<?=$perPage?>"><?=$page+1?></a></li>
            <li class="page-item <?=($page == $nrPages)?'hidden':'';?>">
              <a class="page-link" href="myproducts.php?page=<?=$page+1?>&perPage=<?=$perPage?>" tabindex="-1">Next</a>
            </li>
            <li class="page-item <?=($page == $nrPages)?'hidden':'';?>">
              <a class="page-link" href="myproducts.php?page=<?=$nrPages?>&perPage=<?=$perPage?>">Last</a>
            </li>
          </ul>
        </nav>
      </div>
  </div>

  <?php require('Parts/footer.php'); ?>

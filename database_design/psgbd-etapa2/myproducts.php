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
  $db->query("SELECT * FROM (SELECT a.*, (select name from company c where c.record_id=a.company_id) as companyname, (select name from category ctg where ctg.category_id=a.category_id) as categoryname,ROW_NUMBER() OVER (ORDER BY product_id asc) AS rnum FROM products a) WHERE rnum BETWEEN :p1 AND :p2");
  $db->bind(":p1", $firstIndex);
  $db->bind(":p2", $lastIndex);
  $paginatedEntries = $db->execute()->result();
  $pageTitle = "Products list";
  $bodyClass = "bg-black black";
  require('Parts/header.php');
  require('Parts/headerMenu.php');
  ?>

  <link href="/Assets/css/products.css" rel="stylesheet">
  <link href="/Assets/css/myproducts.css" rel="stylesheet">
  <br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>Search products...</h3>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 col-md-offset-4 text-center">
      <form class="form">
        <div class="form-group col-md-12">
          <input type="text" class="form-control" id="name" placeholder="Enter the product's name">
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">Search</button>
        </div>
      </form>
    </div>
  </div>
</div>
   <?php
  foreach($paginatedEntries as $item) {
    echo '
      <div id="products" class="row">
          <div class="table_product">
              <div class="thumbnail">
                  <img class="image" src="https://maxcdn.icons8.com/Share/icon/Ecommerce//shopping_basket_filled1600.png" alt="" />
                  <div class="caption">
                    <table class="products_list">
                      <tbody>
                         <tr>
                             <td>Name: </td>
                             <td>'. $item->NAME .'</td>
                         </tr>
                         <tr>
                             <td>Category: </td>
                             <td>'. $item->CATEGORYNAME .'</td>
                         </tr>
                         <tr>
                             <td>Company: </td>
                             <td>'. $item->COMPANYNAME .'</td>
                         </tr>
                         <tr>
                             <td>Characteristics: </td>
                             <td>Display: 11", Resolution: 960x1024, Color: stellar grey</td>
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
                                <div style="font-weight:bold; text-align:center;">Are you sure that you want to delete this product?</div>
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

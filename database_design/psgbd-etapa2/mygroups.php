<?php
require('autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

// set default values for page and perPage
$page = empty($_REQUEST['page']) ? 1 : $_REQUEST['page'];
$perPage = empty($_REQUEST['perPage']) ? 7 : $_REQUEST['perPage'];

// count groups from database
$nrGroups = $db->query("select count(*) as nr from GROUPS")
                  ->execute()
                  ->firstResult()
                  ->NR;

// cout total pages number
$nrPages = ceil($nrGroups / $perPage);

// if out of bound return error
if ($page > $nrPages) exit('Invalid page!');
/*
 * Pagination code
 */
$firstIndex = $perPage * ($page - 1) + 1;
$lastIndex = $perPage * $page;

// Load results into $paginatedEntries
$db->query("SELECT * FROM (SELECT a.*, ROW_NUMBER() OVER (ORDER BY group_id asc) AS rnum FROM groups a) WHERE rnum BETWEEN :p1 AND :p2" );
$db->bind(":p1", $firstIndex);
$db->bind(":p2", $lastIndex);
$paginatedEntries = $db->execute()->result();

$pageTitle = "My groups!";
$bodyClass = "bg-black black";
require('Parts/header.php');
require('Parts/headerMenu.php');
?>


<div class="row">
  <div class="col-md-6 col-md-offset-3 ">
  	<div class="panel">

	    <div class="panel-heading">
	      <h4><b>Change/Update your joined groups</b></h4>
	    </div>

	      <div class="panel-body">

	      <?php foreach($paginatedEntries as $item) : ?>
	      <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-0">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
									                  <td class="col-sm-8 col-md-6 col-md-offset-2">
                                            <h5><b>Name : </b><span><?=$item->NAME?></span></h5>
                                            <h5><b>Description : </b><span><?=$item->DESCRIPTION?></span></h5>
                                    </td>
                                    <td class="col-md-0">
				                                <div class=" col-md-offset-2">
				                                    <br><a href="delete.php" style="color:green"><h5>Delete </h5></b></a>
				                                </div>
				                            </td>
                                    <td class="col-md-0">
				                                <div class="col-md-offset-2">
				                                    <br><a href="preferences.php" style="color:green"><b><h5>Add preferences</h5></b></a>
				                                </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          <?php endforeach ?>
  </div>

</div>

     	<nav aria-label="Product navigation" class="text-center">
      <ul class="pagination">
        <li class="page-item <?=($page == 1)?'hidden':'';?>">
          <a class="page-link" href="mygroups.php" tabindex="-1">First</a>
        </li>
        <li class="page-item <?=($page == 1)?'hidden':'';?>">
          <a class="page-link" href="mygroups.php?page=<?=$page-1?>&perPage=<?=$perPage?>" tabindex="-1">Previous</a>
        </li>
        <li class="page-item <?=($page == 1)?'hidden':'';?>"><a class="page-link" href="groups.php?page=<?=$page-1?>&perPage=<?=$perPage?>"><?=$page-1?></a></li>
        <li class="page-item active"><a class="page-link" href="mygroups.php?page=<?=$page?>&perPage=<?=$perPage?>"><?=$page?></a></li>
        <li class="page-item <?=($page == $nrPages)?'hidden':'';?>"><a class="page-link" href="mygroups.php?page=<?=$page+1?>&perPage=<?=$perPage?>"><?=$page+1?></a></li>
        <li class="page-item <?=($page == $nrPages)?'hidden':'';?>">
          <a class="page-link" href="mygroups.php?page=<?=$page+1?>&perPage=<?=$perPage?>" tabindex="-1">Next</a>
        </li>
        <li class="page-item <?=($page == $nrPages)?'hidden':'';?>">
          <a class="page-link" href="mygroups.php?page=<?=$nrPages?>&perPage=<?=$perPage?>">Last</a>
        </li>
      </ul>
    </nav>
</div>
</div>



<?php require('Parts/footer.php'); ?>

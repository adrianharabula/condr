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

$pageTitle = "Groups list";
require('Parts/header.php');
require('Parts/headerMenu.php');
?>
<!-- <link href="/Assets/css/groups.css" rel="stylesheet"> -->

<div class="container page">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>A few groups you can join...</h3>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 col-md-offset-4 text-center">
      <form class="form">
        <div class="form-group col-md-12">
          <input type="text" class="form-control" id="name" placeholder="Enter the group's name">
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">Search</button>
        </div>
      </form>
    </div>
  </div>

<div class="row bg-black">
    <div class="col-md-12 bg-black white">
      <?php foreach($paginatedEntries as $item) : ?>
        <div class="row">
          <div class="col-sm-12 col-md-8">
            <a href="#" class="">Group name: <b><?=$item->NAME?></b></a>
            <p><?=$item->DESCRIPTION?> <span class="badge"><?=$item->GROUP_ID?></span></p>
          </div>
          <div class="col-xs-6 col-md-2"><a href="viewgroups.php" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">Join</a></div>
          <div class="col-xs-6 col-md-2"><a href="viewgroups.php" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">View</a></div>
      </div> <br />
      <?php endforeach ?>
    </div>
    <!-- </ul> -->
    <nav aria-label="Product navigation" class="text-center">
      <ul class="pagination">
        <li class="page-item <?=($page == 1)?'hidden':'';?>">
          <a class="page-link" href="groups.php" tabindex="-1">First</a>
        </li>
        <li class="page-item <?=($page == 1)?'hidden':'';?>">
          <a class="page-link" href="groups.php?page=<?=$page-1?>&perPage=<?=$perPage?>" tabindex="-1">Previous</a>
        </li>
        <li class="page-item <?=($page == 1)?'hidden':'';?>"><a class="page-link" href="groups.php?page=<?=$page-1?>&perPage=<?=$perPage?>"><?=$page-1?></a></li>
        <li class="page-item active"><a class="page-link" href="groups.php?page=<?=$page?>&perPage=<?=$perPage?>"><?=$page?></a></li>
        <li class="page-item <?=($page == $nrPages)?'hidden':'';?>"><a class="page-link" href="groups.php?page=<?=$page+1?>&perPage=<?=$perPage?>"><?=$page+1?></a></li>
        <li class="page-item <?=($page == $nrPages)?'hidden':'';?>">
          <a class="page-link" href="groups.php?page=<?=$page+1?>&perPage=<?=$perPage?>" tabindex="-1">Next</a>
        </li>
        <li class="page-item <?=($page == $nrPages)?'hidden':'';?>">
          <a class="page-link" href="groups.php?page=<?=$nrPages?>&perPage=<?=$perPage?>">Last</a>
        </li>
      </ul>
    </nav>
</div>

</div>

<?php require('Parts/footer.php'); ?>

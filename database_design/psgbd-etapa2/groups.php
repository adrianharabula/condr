<?php
require('autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

// set default values for page and perPage
$page = empty($_REQUEST['page']) ? 1 : $_REQUEST['page'];
$perPage = empty($_REQUEST['perPage']) ? 5 : $_REQUEST['perPage'];

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
?>

<br>
<div class="row">
  <div class="col-md-6 col-md-offset-3 ">
    <h2 style="color: white;">Groups list</h2> <br />
    <div class="list-group">
      <?php
        foreach($paginatedEntries as $item) {
          echo '<a href="#" class="list-group-item">' . $item->NAME .' - '.$item->DESCRIPTION.' <span class="badge">' . $item->GROUP_ID . '</span></a>';
          echo '<div class="content content-nopad">
          <a href="viewgroups.php" class="btn btn-primary my-btn">Join</a>
          <a href="viewgroups.php" class="btn btn-primary my-btn">View</a></div>';
        }
      ?>
    </div>
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

<h1> Show paginated results: </h1>

<!-- <p>Filters:</p>
<form action="register.php" method="post">
    <label for="username">by username: </label><br />
    <input type="text" name="username" id="username" /> <br />
    <input type="submit" name="submit" id="submit" />
</form> -->

<?php
require('../autoload.php');

$db = new Database\Database;
$utils = new Utils\Utils;

if (empty($_REQUEST['page'])) $page = 1;
  else $page = $_REQUEST['page'];
if (empty($_REQUEST['per_page'])) $per_page = 5;
  else $per_page = $_REQUEST['per_page'];

// $db->query("declare ret products_manager.products_array; begin ret:= products_manager.getProductsPage(:p1, :p2); end;");

$db->query("SELECT * FROM (SELECT a.*, ROW_NUMBER() OVER (ORDER BY product_id) AS rnum FROM products a) WHERE rnum BETWEEN :p1 AND :p2" );
$last_index = $per_page * ($per_page * $page + 1);
$first_index = $last_index - $per_page + 1;

$db->bind(":p1", $first_index);
$db->bind(":p2", $last_index);
$result = $db->execute()->result();

// $utils->debug($result);
$utils->debug($result);

// $s = oci_parse($conn, "begin :ret := products_manager.getProductsPage(:p1, :p2); end;");
// oci_bind_by_name($s, ':p1', '2');
// oci_bind_by_name($s, ':p2', '50');
// oci_bind_by_name($s, ':ret', $r);
// oci_execute($s);
// while($row=oci_fetch_array($s))
// {
//     echo $row[0]."-".$row[1]."-".$row[2]."-".$row[3];
//     echo "<br>";
// }

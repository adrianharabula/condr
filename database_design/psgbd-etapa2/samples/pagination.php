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
if (empty($_REQUEST['per_page'])) $per_page = 50;

$db->query("BEGIN products_manager.getProductsPage(:p1, :p2); END;");
$db->bind(":p1", $page);
$db->bind(":p2", $per_page);
$result = $db->execute()->result();

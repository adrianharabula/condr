<?php
$config = include('../config.php');
$conn = oci_connect($config->user, $config->pass, $config->host.':'.$config->port.'/'.$config->sid);

echo "Client Version: " . oci_client_version();
echo "<br />";
echo "Server Version: " . oci_server_version($conn);

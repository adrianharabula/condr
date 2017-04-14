<?php
$sql="select * from groups where group_name = ".$_GET["group_name"];
$conn = oci_connect("student", "STUDENT", "//srv113.adrianharabula.ro:1523/XE");
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);
$row=oci_fetch_row($stmt);
oci_free_statement($stmt);
oci_close($conn);
?>


<?php
$conn = oci_connect("student", "STUDENT", "//srv113.adrianharabula.ro:1523/XE");

$sql = "UPDATE Groups SET name=:name, description=:description where group_name=:group_name;";
$stmt = oci_parse($conn, $update);
oci_bind_by_name($stmt, ':name', $name);
oci_bind_by_name($stmt, ':description', description);
oci_bind_by_name($stmt, ':group_name', group_name);

$result = oci_execute($stmt, OCI_DEFAULT);
if (!$result)
{
  echo oci_error();
}

oci_commit($conn);
oci_close($conn);
?>

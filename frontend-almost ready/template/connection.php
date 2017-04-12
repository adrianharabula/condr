<?php
// Create connection to Oracle
$conn = oci_connect("student", "STUDENT", "//srv113.adrianharabula.ro:1523/XE");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
   print "Connected to Oracle!";
}

$array = oci_parse($conn, "SELECT relevanta(ID),ID
                            FROM QUESTIONS");
oci_execute($array);
while($row=oci_fetch_array($array))
{
    echo $row[0]."-".$row[1];
    echo "\r\n";
}

// Close the Oracle connection
oci_close($conn);
?>

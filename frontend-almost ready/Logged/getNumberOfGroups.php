<?php
include('C:\wamp\www\firstversion\template\notLogged\homepage.php');
if(isset($_REQUEST['seegroup']) && $_SESSION['user'])
{  $rez = oci_parse($conn, "begin :ret :=users_groups(:p1); end;");
  oci_bind_by_name($rez, ':p1', $_SESSION['user']);
  oci_bind_by_name($rez, ':ret', $r);
  oci_execute($rez);
  if($r != 0)
  {
    echo"You joined ".$r." groups!";
  }
  else {
    echo "You haven't joined a group..!<br>";
  }
}

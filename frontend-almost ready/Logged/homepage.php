<html>
  <head>
       <title> Home </title>
  </head>
  <body>
<?php

  include('C:\wamp\www\notLogged\login.php');
  if(!isset($_SESSION['user'])) // If session is not set then redirect to Login Page
  {
        echo "<p>not logged.....<\p>".$_SESSION['user'];
  }

  echo "<p>Session username:</p>".$_SESSION['user'];

  echo "<p>Login Success</p>";
  header("Location: http://localhost/Logged/index.html");

?>
<!--
<form action="getNumberOfGroups.php" method="post">
  <p>See how many groups you joined!</p>
  <input type="submit" name="seegroup" />
</form>
-->

</body>
</html>

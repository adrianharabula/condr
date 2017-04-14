<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

  </head>
  <body background="img/bp_background_2_blue1.jpg">

    <div id="tf-home">
        <div class="overlay">
            <div id="sticky-anchor"></div>
            <nav id="tf-menu" class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand logo" href="index.html">Consumer Decision Maker</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="login.html">Login In</a></li>
                        <li><a href="register.html">Register</a></li>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>


    <?php
    // Create connection to Oracle
    $conn = oci_connect("condr","condr","//srv.condr.me:1521/XE");
    session_start();
    if (!$conn) {
       $m = oci_error();
       echo $m['message'], "\n";
       exit;
    }



    if(isset($_REQUEST['register']))
    {
      if(isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['email']))
      {
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $email=$_REQUEST['email'];

        $s = oci_parse($conn, "begin :ret :=user_manager.register(:p1,:p2,:p3); end;");
        oci_bind_by_name($s, ':p1', $username);
        oci_bind_by_name($s, ':p2', $password);
        oci_bind_by_name($s, ':p3', $email);
        oci_bind_by_name($s, ':ret', $r);
        oci_execute($s);

        if($r == 1)
        {
          echo"Registered with success!<br>";
          echo "Your username: ".$username."<br>";
          $_SESSION['user']=$username;
          header("Location: http://localhost/Logged/homepage.php");
        }
        else {
          echo "Register failed!<br>";
          echo $username;
        }
      }
    }
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>

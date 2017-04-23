<div class="overlay">
    <div id="sticky-anchor"></div>
    <nav id="tf-menu" class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand logo hidden-xs hidden-sm" href="/"><i class="fa fa-money fa-custom"></i> Consumer Decision Maker</a>
              <a class="navbar-brand logo visible-xs visible-sm" href="/"><i class="fa fa-money fa-custom"></i> ConDr</a>
            </div>

            <div id="menu" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="index.php">Home</a></li> -->
                <!-- <li><a href="about.php">About</a></li> -->
                <?=isset($_SESSION['username'])? "<li><a href='preferences.php'>Preferences</a></li>":""?>
                <li><a href="products.php">Products</a></li>
                <li><a href="groups.php">Groups</a></li>
                <li><a href="statistics.php">Statistics</a></li>
                <!-- <li><a href="contact.php">Contact</a></li> -->
                <?=!isset($_SESSION['username'])?
                "<li><a href='login.php'>Log In</a></li>
                 <li><a href='register.php'>Register</a></li>":""?>

                 <?php if(isset($_SESSION['username'])) : ?>
                 <li class="dropdown">
                   <a href="#" class="btn btn-primary my-btn my-btn-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My profile <span class="caret"></span></a>
                   <ul class="dropdown-menu my-profile">
                     <li><a href="mydetails.php">Details</a></li>
                     <li><a href="mypreferences.php">Preferences</a></li>
                     <li><a href="myproducts.php">Products</a></li>
                     <li><a href="mygroups">Groups</a></li>
                     <li role="separator" class="divider"></li>
                     <li><a href="logout.php">Log Out</a></li>
                   </ul>
                 </li>
                 <?php endif; ?>
              </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->

    </nav>
</div>

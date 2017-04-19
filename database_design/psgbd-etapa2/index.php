<?php
require('autoload.php');

$pageTitle = "Welcome Page";
require('Parts/header.php');
?>

<div id="tf-home">
    <div class="overlay">
        <div id="sticky-anchor"></div>


        <div class="container">
            <div class="content">
                <h3 id="main-logo">ConDr</h3>
                <h3>Good decisions have never been so easy to take!</h3>
                <br>
                <a href="register.php" class="btn btn-primary my-btn">Let's get started!</a>
                <a href="contact.php" class="btn btn-primary my-btn2">Contact us!</a>
            </div>
        </div>
    </div>
</div>

<nav id="tf-footer">
    <div class="container">
         <div class="pull-left">
            <p>2017 © ConDr. All Rights Reserved.</p>
</nav>

<?php require('Parts/footer.php'); ?>

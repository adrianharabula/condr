<?php
require('autoload.php');

$pageTitle = "Welcome Page";
require('Parts/header.php');
?>


<link href="/Assets/css/contact.css" rel="stylesheet">
<div class="container contact">
  <form id="contact" action="" method="post">
    <h3>ConDr Contact Form</h3>
    <h4>Tell us what you think! Your opinion matters!</h4>
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number (optional)" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Web Site (optional)" type="url" tabindex="4" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="Submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>


<?php require('Parts/footer.php'); ?>

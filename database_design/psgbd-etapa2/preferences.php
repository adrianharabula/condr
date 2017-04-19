<?php
require('autoload.php');

$pageTitle = "Preferences";
require('Parts/header.php');
?>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Enter your preferences here and let's get started!</div>
      <div class="panel-body">
        <div class="col-md-6">
          <form role="form">

            <div class="form-group">
              <label>Product name*</label>
              <input class="form-control" placeholder="Enter the name of the desired product">
            </div>

            <div class="form-group">
              <label>Provider</label>
              <input type="password" class="form-control">
            </div>

            <div class="form-group checkbox">
              <label>
                <input type="checkbox">Add product to my history</label>
            </div>

          </div>
          <div class="col-md-6">

            <div class="form-group">
              <label>Tell us what to look after!</label>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">I am searching for the following characteristics
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">I do not want the following characteristics
                </label>
              </div>
            </div>


            <div class="form-group">
              <label>Select your preferences from our predefined list...</label>
              <select multiple class="form-control">
                <option>Allergy: nuts</option>
                <option>Allergy: gluten</option>
                <option>Battery: good</option>
                <option>Charging time: 1h</option>
                <option>Charging time: <1h</option>
                <option>Color: black</option>
                <option>Color: white</option>
                <option>Color: blue</option>
                <option>Dimension: 13"</option>
                <option>Dimension: 15"</option>
                <option>Dimension: 17"</option>
                <option>Size: small</option>
                <option>Size: medium</option>
                <option>Size: large</option>
                <option>Taste: sweet</option>
                <option>Taste: sour</option>
                <option>Taste: chilli</option>
              </select>
            </div>

            <div class="form-group">
              <label><br>...or enter your own preferences!*</label>

                <div class="container">
                  <div class="row">
                    <input type="hidden" name="count" value="1" />
                        <div class="control-group" id="fields">
                            <div class="controls" id="profs">
                                <form class="input-append">
                                    <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Add your preferences" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                                </form>
                            <small>Press + to add another preference field :)</small>
                            </div>
                        </div>
                  <small>*Your preferences must consist from a noun and an attribute, separated by : and one space, as showed before!</small>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Get the results!</button>
            <a href="forms.html">
              <button type="reset" class="btn btn-default">Reset form</button>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div><!-- /.col-->
</div><!-- /.row -->


<?php require('Parts/footer.php'); ?>

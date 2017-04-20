<?php
require('autoload.php');
$pageTitle = "Preferences";
require('Parts/header.php');
?>

            <div class="form-group">
              <label>...or enter your own wanted preferences!*</label>
              <input type="hidden" name="count" value="1" />
              <div class="control-group" id="fields">
                  <div class="controls" id="profs">
                      <form class="input-append">
                          <div id="fieldd1" class=''><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                      </form>
                  </div>
              </div>
            </div>


<?php require('Parts/footer.php'); ?>

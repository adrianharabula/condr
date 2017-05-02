<?php
namespace Utils;

class Utils {

  /*
  * print_r with pre tags
  * Used for debugging
  * USAGE EXAMPLE: $utils->debug($result);
  */
  public function debug($result) {
      echo '<pre>',print_r($result, 1),'</pre>';
  }
}

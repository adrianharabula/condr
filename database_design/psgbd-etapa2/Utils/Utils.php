<?php
namespace Utils;

class Utils {
  public function debug($result) {
      echo '<pre>',print_r($result, 1),'</pre>';
  }
}

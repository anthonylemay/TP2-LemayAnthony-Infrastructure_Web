<?php
function logToConsole2($message) {
    echo '<script>console.log("' . $message . '");</script>';
  }
  logToConsole2("controller Debug - Test 2 Model Path OK .");
  require_once __DIR__ . '/../include/test.php';

?>
<?php
// Stop Cake from displaying action's execution time
Configure::write('debug', 0);

$filename = 'Contact-List';
header("Content-disposition: attachment; filename=$filename.csv");
header("Content-type: text/csv");

  foreach ($contacts as $row) {   
    foreach ($row['Contact'] as &$value) {
      $value = "\"".$value."\"";
    }
    echo implode(",",$row['Contact'])."\n";
  }
?>
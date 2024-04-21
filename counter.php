<?php

  session_start();

  if (!isset($_COOKIE["visited-data"])) {
    $_SESSION["visit_counts"] = array(
      'ballina' => 0,
      'veglat' => 0,
      'argetimi' => 0,
      'literatura' => 0,
      'info' => 0,
      'rreth-nesh' => 0
    );
  }

  function incrementVisitCount($page){
    if (isset($_SESSION['visit_counts'][$page])) {
      $_SESSION['visit_counts'][$page] ++;
    }
  }

?>
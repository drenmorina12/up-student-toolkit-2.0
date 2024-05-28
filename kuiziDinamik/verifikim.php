<?php
  if (isset($_POST['sakte'])) {
    var_dump("U zgjedh " . $_POST['sakte']);
    } else {
    var_dump("Nuk u zgjodh asnjë përgjigje");
  }
  var_dump($_POST);
?>
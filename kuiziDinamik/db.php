<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "up_studenttoolkit";

$db = mysqli_connect($server, $user, $password);
mysqli_select_db($db , $database);

?>
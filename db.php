<?php 
$host = 'localhost'; 
    $db = 'up_studenttoolkit'; 
    $user = 'root'; 
    $pass = ''; 
    
    try{
        $conn = mysqli_connect($host, $user, $pass, $db);
    }
    catch(mysqli_sql_exception){
        echo "Deshtim ne lidhje me serverin MySql";
    }

  ?>
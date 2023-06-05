<?php
    
    $db_server = "localhost";
    $db_user = "Ray";
    $db_pass = "";
    $db_name = "final";
    try {
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }
    catch(mysqli_sql_exception) {
        echo"Can not Connected";
    }
    
?>

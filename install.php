<?php
    include("check_index.php");
    function ($conn)
    {
        return $conn;
    }

    if (mysql_query("SOURCE rush.sql"))
    {

        echo "Hello Sonny";
      
    } 
?>
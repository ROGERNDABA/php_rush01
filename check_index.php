<?php
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "Ndabezitha2";
        $db = "rush00";
        $conn = @mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        return $conn;
    }

    function CloseCon($conn)
    {
        $conn -> close();
    }
    //$conn = OpenCon();
        //if ($conn) echo "Connected Successfully";
?>
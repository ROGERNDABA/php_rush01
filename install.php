<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "Ndabezitha2";
    $db = "rush00";
    $servername = "localhost";


    $conn = new mysqli($dbhost, $dbuser, $dbpass);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "CREATE DATABASE rush00";
    $conn->query($sql);
    $conn->query("USE DATABASE rush00");

    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS rush00 . rush00 (username varchar(32) NOT NULL, name varchar(32) NOT NULL, surname varchar (32) NOT NULL, email varchar(30) NOT NULL, phone_number varchar(32) NOT NULL, ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, isadmin ENUM('1', '0') NOT NULL)");
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS rush00 . passwords (username varchar(32) NOT NULL, passwd varchar(32) NOT NULL)");
    mysqli_query($conn, "INSERT INTO  rush00 . passwords (username, passwd) VALUES ('adminunlock', 'dontunlock')");
    mysqli_query($conn, "INSERT INTO  rush00 . rush00 (username, name, surname, email, phone_number, isadmin) VALUES ('adminunlock', 'adminunlock', 'adminunlock', 'adminunlock', 'adminunlock', '1')");
    header("Location: index.phtml");
    $conn->close();
?>
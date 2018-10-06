<?php
    if (isset($_GET['get']))
    {
        echo 'you such';
    }
    if(!$_POST["login"] || !$_POST["passwd"])
    {
        $msg = "You left one or more of the required fields.";
        header("Location: index.php?msg=$msg");
    }
?>
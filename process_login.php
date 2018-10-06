<?php
    if(!$_POST["username"] || !$_POST["password"])
    {
        $msg = "You left one or more of the required fields.";
        $msgEncoded = base64_encode($msg);
        header("location:index.php?msg=".$msgEncoded);
    }
?>
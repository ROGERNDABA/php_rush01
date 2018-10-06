<?php
    OpenCon();
   if(!$_POST["login"] || !$_POST["passwd"])
   {
       $msg = "Blank field for Username or Password";
       $msgEncoded = base64_encode($msg);
       header("location:index.phtml?msg=".$msgEncoded);
   }
   {
       header("Location: login.php");
   }
?>
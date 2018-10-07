<?php
    $uploads_dir = "./uploads";
        if (isset($_POST["upload"])) {
            if (file_exists($uploads_dir."/".$_FILES['file_upload']['name']))
                echo "you are full of shit";
            elseif( $_FILES['file_upload']['name'] != "" )
            {
              copy($_FILES['file_upload']['tmp_name'], 
               $uploads_dir."/".$_FILES['file_upload']['name'] ) 
                or die( "Could not copy file" );
            }
            else
            {
              die( "No file specified" );
            }
            header("Location: admin_login.phtml");
    }
?>
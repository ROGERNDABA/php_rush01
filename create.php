<?php
    include("check_index.php");
    include("process_info.php");

    $conn = OpenCon();
    $name = $_POST['name'];
    $surname  = $_POST['surname'];
    $username = $_POST['login'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    $s = "SELECT username, passwd FROM passwords";
    $q = "INSERT INTO `rush00`(`name`, `surname`, `username`, `phone_number`, `email`, `isadmin`) VALUES (\"$name\",\"$surname\",\"$username\",\"$phone_number\",\"$email\",0)";
    $q2 = "INSERT INTO `passwords`(`username`,  `passwd`) VALUES (\"$username\", \"$passwd\")";
    if ($conn) echo "asdasdasdasd"; else echo "shit";
    if (!$_POST['name'] || !$_POST['surname'] || !$_POST['login'] || !$_POST['email'] ||
    !$_POST['passwd'] || !$_POST['phone_number'])
    {
        $msg = "All fields required.";
       $msgEncoded = base64_encode($msg);
       header("location:new_account.phtml?msg=".$msgEncoded);
       exit;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format";
       $msgEncoded = base64_encode($msg);
       header("location:new_account.phtml?msg=".$msgEncoded);
       exit;
      }
    elseif (!preg_match("/^[a-zA-Z ]*$/", $name) && !preg_match("/^[a-zA-Z ]*$/", $surname)) {
        $msg = "Only letters and white space allowed in Name fields"; 
        $msgEncoded = base64_encode($msg);
        header("location:new_account.phtml?msg=".$msgEncoded);
        exit;
      }
      elseif (!preg_match("/^(\+27|27)?(\()?0?[87][23467](\))?( |-|\.|_)?(\d{3})( |-|\.|_)?(\d{4})/", $phone_number))
      {
        $msg = "Uknown phone number type"; 
        $msgEncoded = base64_encode($msg);
        header("location:new_account.phtml?msg=".$msgEncoded);
        exit;
      }
    else
    {
        $re = $conn->query($s);
        $msg = "Sorry! Username already taken";
        $msgEncoded = base64_encode($msg);
        while($row = $re->fetch_assoc()) {
        if (!strcmp($_POST['login'], "adminunlock"))
        {
            header("location:new_account.phtml?msg=".$msgEncoded);
            exit();
        }
        else if (!strcmp($row['username'], $username))
        {
           header("location:new_account.phtml?msg=".$msgEncoded);
           exit();
        }
    }
    }
    $phone_check = "SELECT username, email FROM rush00";
    $re = $conn->query($phone_check);
    while($row = $re->fetch_assoc()) {
        if (!strcmp($row['username'], $username))
        {
            $msg = "Username alrady exists";
           header("location:new_account.phtml?msg=".$msgEncoded);
           exit();
        }
        elseif (!strcmp($row['email'], $email))
        {
            $msg = "Email alrady exists";
           header("location:new_account.phtml?msg=".$msgEncoded);
           exit();
        }
    }
    header("Location: login.php");
    $re = $conn->query($q);
    $re = $conn->query($q2);
?>
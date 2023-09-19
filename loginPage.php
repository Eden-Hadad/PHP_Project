
<?php
session_start();
include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql=$mysql_obj->GetConn();
include "class_users.php";
$users_obj=new users($mysql);


if(isset($_GET['btnPressed'])) {
    $uname = (isset($_GET['uname'])) ? $_GET['uname'] : "";
    $pass = (isset($_GET['pass'])) ? $_GET['pass'] : "";
    if ($users_obj->IsValid($uname, $pass)) {
        $_SESSION['ValidUser']=$uname;

        //TOKEN using for  CSRF 
        $_SESSION['TOKEN']= substr(md5(rand(100,999)),0,10);
        setcookie("MyUser",$uname);
        header("location:page1.php");
    }
    else{
        setcookie("MyUser",0);

      
       
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
<form action="" method="get">
    <input type="text" name="username" placeholder="user name" />
    <br>
    <input type="text" name="pass" placeholder="password" />
    <br>
    <button name="btnPressed" value="1">send</button>
</form>

</body>
</html>
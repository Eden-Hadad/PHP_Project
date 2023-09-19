<?php
include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql=$mysql_obj->GetConn();

include "class_users.php";
$user_obj = new users($mysql);

if(isset($_GET['SendBtn'])) {
    $user_obj->UpdateUser($_GET);

    header("location:./UsersList_SSR_OOP.php");
}

$id = isset($_GET['rid']) ? $_GET['rid'] : -1;
$row=$user_obj->GetUser($id);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update user</title>
</head>
<body>
    <h1>update user</h1>
<form action="" method="get">
    <input type="hidden" name="id" value="<?= $id ?>" />
    <input type="text" name="username"  value="<?= $row['username'] ?>" />
    <br>
    <input type="text" name="phoneNum" value="<?= $row['phoneNum'] ?>" />
    <br>
    <input type="text" name="mailboxNum" value="<?= $row['mailboxNum'] ?>" />
    <br>

    <button name="SendBtn" value="1">send</button>
</form>
</body>
</html>

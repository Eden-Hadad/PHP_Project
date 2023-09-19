<?php
include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql=$mysql_obj->GetConn();

include "class_users.php";
$user_obj = new users($mysql);

if(isset($_GET['SendBtn'])) {
    $user_obj->DeleteUser($_GET);

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
    <title>Delete user</title>
    <style>
        body{background-color: lightblue;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;}
        #container{ width:fit-content; border: black solid 1px;}
    </style>
</head>
<body>
<div id="container">
    <h1>users list</h1>
<table>
    <tr>
        <th></th>
        <th>lecture</th>
        <th>mailbox number</th>
    </tr>
    <?php
    foreach ($uList as $row) { ?>
        <tr>
            <!--against the --->
            <td><a href="./editUser.php?rid=<?= $row['id'] ?>">edit</a> </td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><a href="./editUser.php?rid=<?= htmlspecialchars($row['phoneNum']) ?>">edit</td>
        </tr>
    </div>
    <?php } ?>
</body>
</html>

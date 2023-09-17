<?php
session_start();

include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql=$mysql_obj->GetConn();


if(isset($_GET['SendBtn'])) {
        include "class_users.php";
        $user_obj = new users($mysql);
        $user_obj->CreateUser($_GET);
        
    }
    
    

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create user</title>
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
    <div id = "container">
        <h1>User Create</h1>
<form action="" method="get">

                <h2>enter username</h2>
        <input type="text" name="name" placeholder="username" />
        
        <h2> enter mailbox number</h2>
        <input type="text" name="mailboxNum" placeholder="mailboxNum"  />
       
        <h2>enter phone number </h2>
        <input type="text" name="phoneNum" placeholder="phone number"  />
        
        <h4>password already exist</h4>
        <input type="text" name="password" value="AAA" />
        <br>
        <button name="SendBtn" value="1">send</button>
    </div>
</form>
</body>
</html>

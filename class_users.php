<?php

class users {
    private $mysql;

    function __construct($conn) {
        $this->mysql=$conn;
    }
   



    //Create user
    public function CreateUser($params){
        $mailBox=isset($params['mailboxNum']) ? $params['mailboxNum'] : "";
        $uname=isset($params['name']) ? $params['name'] : "";
        $passw = "AAA";
        $phNum=isset($params['phoneNum']) ? $params['phoneNum'] : "";

       
        if(!empty($uname)) {
            $q = "INSERT INTO `mailbox_manager` ( `mailboxNum`,`name`, `password`, `phoneNum`) ";
            $q .= " VALUES ( '$mailBox', '$uname','$passw','$phNum') ";

            $result = mysqli_query($this->mysql, $q);
            echo $result;
        }

    }

 public function UpdateUser($params){
     $id=isset($params['id']) ? $params['id'] : -1;
     $uname=isset($params['username']) ? $params['username'] : "";
     $phNum=isset($params['phoneNum']) ? $params['phoneNum'] : "";
     $mailBox=isset($params['mailboxNum']) ? $params['mailboxNum'] : "";

     if($id > 0 ) {
         $q = "UPDATE `users` SET  ";
         $q .= "`username`='$uname' , ";
         $q .= "`phoneNum`='$phNum'  ";
         $q .= "`mailBoxNum`='$mailBox'  ";
         $q .= " WHERE id= $id ";

         $result = mysqli_query($this->mysql, $q);
     }

 }
    public function GetList(){
        $q  = "SELECT * FROM `mailbox_manager` ";
        $result = mysqli_query($this->mysql, $q);
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
        return $data;
    }
    public function GetUser($id){
        $q  = "SELECT * FROM `mailbox_manager` ";
        $q .= " WHERE id= $id";
        $result = mysqli_query($this->mysql, $q);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }
}
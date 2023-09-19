<?php

class users {
    private $mysql;

    function __construct($conn) {
        $this->mysql=$conn;
    }
   
 

    //Create user

    public function CreateUser($params){
       
        $mailBox=isset($params['mailboxNum']) ? $params['mailboxNum'] : "";
        $uname=isset($params['username']) ? $params['username'] : "";
        $passw = "AAA";
        $phNum=isset($params['phoneNum']) ? $params['phoneNum'] : "";
        $valid_until="";
       
        if(!empty($uname)) {
            $q = "INSERT INTO `mailbox_manager1` ( `mailboxNum`,`username`, `pass`, `phoneNum`) ";
            $q .= " VALUES ( '$mailBox', '$uname','$passw','$phNum','$valid_until') ";

            $result = mysqli_query($this->mysql, $q);
            echo $result;
        }
    }
    public function IsValid($u,$p){
      
        $q  = "SELECT * FROM `mailbox_manager1` ";
        $q .= " WHERE username='$u' AND pass='AAA' ";
        $result = mysqli_query($this->mysql, $q);

        if(mysqli_num_rows($result)>0)
            return true;
        return false;
    }


 public function UpdateUser($params){
     $id=isset($params['id']) ? $params['id'] : -1;
     $uname=isset($params['username']) ? $params['username'] : "";
     $phNum=isset($params['phoneNum']) ? $params['phoneNum'] : "";
     $mailBox=isset($params['mailboxNum']) ? $params['mailboxNum'] : "";

     if($id > 0 ) {
         $q = "UPDATE `,mailbox_manager1` SET  ";
         $q .= "`mailBoxNum`='$mailBox'  ";
         $q .= "`phoneNum`='$phNum'  ";
         $q .= "`username`='$uname' , ";
         $q .= " WHERE id= $id ";

         $result = mysqli_query($this->mysql, $q);
     }

 }
    public function GetList(){
        $q  = "SELECT * FROM `mailbox_manager1` ";
        $result = mysqli_query($this->mysql, $q);
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
        return $data;
    }
    public function GetUser($id){
        $q  = "SELECT * FROM `mailbox_manager1` ";
        $q .= " WHERE id= $id";
        $result = mysqli_query($this->mysql, $q);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }
}
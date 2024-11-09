<?php
  include_once('pdo.php');
  function getUserById($id_user){
    return PDO_query("
      select * from user 
      where id_user = :id
    ",["id"=>$id_user]);
  }

  function login($username,$pass){
    $re= PDO_query("
      select * from user 
      where password=:pass and gmail=:user or phonenumber=:user
    ",['pass'=>$pass,'user'=>$username]);

    if(count($re)>0){
      $_SESSION['role']=$re[0]['role'];
      $_SESSION['user']=$re[0]['id_user'];
      unset($re);
      return 1;
    }
    unset($re);
    return 0;
}
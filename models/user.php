<?php
  include_once('pdo.php');
  function getUserById($id_user){
    return PDO_query("
      select * from user 
      where id_user = :id
    ",["id"=>$id_user]);
  }
  function checkAdminUser($id_user){
    return PDO_query("
      select role from user 
      where id_user = :id
    ",["id"=>$id_user])[0];
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
  function register($name,$email,$phone,$pass){
    //0: email || phonenunber da ton tai
    //1: thanh cong
    //-1: sai dinh dang
    if(!(checkphonenumber($phone) && checkmail($email))){
      return -1;
    }
    $check = PDO_query("
      select * from user 
      where gmail=:gmail or phonenumber=:phone",
      ['gmail'=>$email,'phone'=>$phone]
    );
    if(count($check)==0){
        PDO_execute("
        INSERT INTO user(ten_user,password,gmail,phonenumber)
        Value( :name , :pass , :gmail , :phone )",
        ['name'=>$name,'pass'=>$pass,'gmail'=>$email,'phone'=>$phone]);
        return 1;
    }
    else{
      return 0;
    }
  }


  function checkmail($mail){
    return str_contains($mail,'@');
  }
  function checkphonenumber($phone){
    return strlen($phone) > 9 && strlen($phone) <15 && is_numeric($phone);
  }
  function logout(){
      session_unset();
  }
  
  function changeaccountinfo($info){
    if(!filter_var($info['email'], FILTER_VALIDATE_EMAIL)){
      header("Refresh:0; url=index.php?page=account&tag=info&error=email khong hop le");
      return 0;
    }
    PDO_execute("UPDATE user SET 
      ten_user = :username,
      gmail    = :usermail,
      phonenumber=:userphone,
      `address`=:userad
      WHERE id_user =:id",[
        'username'=>$info['ten_user'],
        'usermail'=>$info['email'],
        'userphone'=>$info['phonenumber'],
        'userad'=>$info['address'],
        'id'=>$info['id_user'],
      ]);
    // echo json_encode($info,JSON_FORCE_OBJECT);
    header("Refresh:0; url=index.php?page=account&tag=info&success=doi thong tin tai khoan thanh cong");
    return 1;

  }



  function getAddressUser($id){
    return PDO_query("SELECT `address` from user where id_user = :id",['id'=>$id])[0]['address'];
  }


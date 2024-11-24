<?php
  include_once('pdo.php');
  function getAllHang(){
    return PDO_query("SELECT * FROM hang");
  }
  function getHangById($id){
    return PDO_query("SELECT * FROM hang where id_hang=:id",['id'=>$id])[0];
  }
  function adminAddHang(){
    
  }
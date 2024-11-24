<?php
  include_once('pdo.php');
  function getAllDm(){
    return PDO_query("SELECT * FROM danhmuc");
  }
  function getDanhmucById($id){
    return PDO_query("SELECT * FROM danhmuc where id_danhmuc=:id",['id'=>$id])[0];
  }
  function adminAddDm(){
    // PDO_execute("");
    
  }
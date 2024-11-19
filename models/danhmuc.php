<?php
  include_once('pdo.php');
  function getAllDm(){
    return PDO_query("SELECT * FROM danhmuc");
  }
<?php
  include_once('pdo.php');
  function getAllHang(){
    return PDO_query("SELECT * FROM hang");
  }
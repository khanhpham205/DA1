<?php
  include_once('pdo.php');
  function getAllHang(){
    return PDO_query("SELECT * FROM hang");
  }
  function getHangById($id){
    return PDO_query("SELECT * FROM hang where id_hang=:id",['id'=>$id])[0];
  }
  function adminAddHang($info){
    if(PDO_query("SELECT * FROM hang where ten_hang = :namee",['namee'=>$info['ten_hang']])){
      return 0;
    }
    $da=PDO_execute("INSERT INTO 
      hang(ten_hang,mota_hang)
      value  (:ten, :mota)",[
        'ten'=>$info['ten_hang'],
        'mota'=>$info['mota_hang'],
      ]);
    $img = $_FILES['hangimg'];
    $nametmp = explode('.',$img['name']);
    $imgbanner="Banner_hang_{$da}.{$nametmp[1]}";
    move_uploaded_file($img['tmp_name'],"./contents/imgs/banner/{$imgbanner}");
    PDO_execute("UPDATE hang set img = :imgname where id_hang=:id",[
      'imgname'=>$imgbanner,
      'id'=>$da
    ]);
    return 1;
  }
  function adminEditHang($info){

    PDO_execute("UPDATE hang SET ten_hang = :ten,mota_hamg=:mota where id_hang=:id",[
      'ten'=>$info['ten_hang'],
      'mota'=>$info['mota_hang'],
      'id'=>$info['id_hang']
    ]);
    if(isset($_FILES['hangimg'])){
      $bannername = PDO_query("SELECT * FROM hang where id_hang=:id",[
        'id'=>$info['id_hang']
      ])[0];
      unlink("./contents/imgs/banner/{$bannername['img']}");
      $img = $_FILES['hangimg'];
      $nametmp = explode('.',$img['name']);
      if(str_contains($nametmp[0],'tmp')){
        $mmm ='';
      }else{
        $mmm ='tmp';
      }
      $imgbanner="Banner_hang_{$info['id_hang']}{$mmm}.{$nametmp[1]}";
      move_uploaded_file($img['tmp_name'],"./contents/imgs/banner/{$imgbanner}");
      PDO_execute("UPDATE hang SET img =:imgbanner where id_hang=:id",[
        'imgbanner'=>$imgbanner,
        'id'=>$info['id_hang']
      ]);
    }
  }
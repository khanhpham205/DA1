<?php
  include_once('pdo.php');
  function getAllDm(){
    return PDO_query("SELECT * FROM danhmuc");
  }
  function getDanhmucById($id){
    return PDO_query("SELECT * FROM danhmuc where id_danhmuc=:id",['id'=>$id])[0];
  }
  function adminAddDm($info){
    if(PDO_query("SELECT * FROM danhmuc where ten_danhmuc = :namee",['namee'=>$info['ten_danhmuc']])){
      return 0;
    }
    $da=PDO_execute("INSERT INTO 
      danhmuc(ten_danhmuc,mota_danhmuc)
      value  (:ten, :mota)",[
        'ten'=>$info['ten_danhmuc'],
        'mota'=>$info['mota_danhmuc'],
      ]);
    $img = $_FILES['danhmucimg'];
    $nametmp = explode('.',$img['name']);
    $imgbanner="Banner_danhmuc_{$da}.{$nametmp[1]}";
    move_uploaded_file($img['tmp_name'],"./contents/imgs/banner/{$imgbanner}");
    PDO_execute("UPDATE danhmuc set img = :imgname where id_danhmuc=:id",[
      'imgname'=>$imgbanner,
      'id'=>$da
    ]);
    return 1;
  }
  function adminEditDm($info){
    PDO_execute("UPDATE danhmuc SET ten_danhmuc = :ten,mota_danhmuc=:mota where id_danhmuc=:id",[
      'ten'=>$info['ten_danhmuc'],
      'mota'=>$info['mota_danhmuc'],
      'id'=>$info['id_dm']
    ]);
    // danhmucimg
    if(isset($_FILES['danhmucimg']) && $_FILES["danhmucimg"]['name'][0]){
      $bannername = PDO_query("SELECT * FROM danhmuc where id_danhmuc=:id",[
        'id'=>$info['id_dm']
      ])[0];
      unlink("./contents/imgs/banner/{$bannername['img']}");
      $img = $_FILES['danhmucimg'];
      $nametmp = explode('.',$img['name']);
      if(str_contains($nametmp[0],'tmp')){
        $mmm ='';
      }else{
        $mmm ='tmp';
      }
      $imgbanner="Banner_danhmuc_{$info['id_dm']}{$mmm}.{$nametmp[1]}";
      move_uploaded_file($img['tmp_name'],"./contents/imgs/banner/{$imgbanner}");
      PDO_execute("UPDATE danhmuc SET img =:imgbanner where id_danhmuc=:id",[
        'imgbanner'=>$imgbanner,
        'id'=>$info['id_dm']
      ]);
    }
  }
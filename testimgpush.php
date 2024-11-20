<?php

    function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }


    if(isset($_POST['cc']) && $_POST['cc']){
        $img0 = reArrayFiles($_FILES['image']);
        foreach($img0 as $img){
            // var_dump($img);
            // echo json_encode($img,JSON_FORCE_OBJECT); 
        }
        // echo json_encode($_FILES['image1'],JSON_FORCE_OBJECT) .'<br>';

        move_uploaded_file($_FILES['image1']['tmp_name'],__DIR__."/{$_FILES['image1']['name']}");

    }

    $a = 'Chuột không dây siêu nhẹ Pulsar Xlite V4';
    $b = 'Chuột không  dây   siêu nhẹ    Pulsar    Xlite     V4 ';
    $string = str_replace(' ', '', $b);
    $string1 = str_replace(' ', '', $a);
    echo $string == $string1;

?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image[]" id="image" accept="image/*" multiple>
    <input type="file" name="image1" id="image" accept="image/*" >
    <input type="submit" name="cc" value="cc">
</form>

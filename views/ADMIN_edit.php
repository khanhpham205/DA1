<style>

    input,select{
        background: #eee;
        border: none;
        margin: 8px 0;
        padding: 10px 15px;
        font-size: 13px;
        border-radius: 8px;
        width: 100%;
        outline: none;
    }
    main{
        #ten_sanpham{
            grid-column: 1/13;
        }
        #gia_sanpham{
            grid-column: span 4;
        }
        #giamgia_sanpham{
            grid-column:span 2;

        }
        .mota_sanpham{
            grid-column: span 6;
            grid-row: span 2;
            height: 100%;
            border-radius: 5px;
            padding:10px;
            resize: none;

        }
        #danhmuc{
            grid-column: span 3;
        }
        #hang{
            grid-column: span 3;

        }
        input[type=file]{
            display: none;
        }
        .imglabel{
            background-color: #FF794C;
            color: #fff;
            border: 2px solid #FF794C;
            border-radius: 6px;
            padding: 6px;
        }
        .imglabel:hover{
            background: none;
            color: #FF794C;
        }

        .imgbox{
            height: fit-content;
            max-height: 100px;
            overflow: hidden;
            display: flex;
            >img{
                height: 80px;
                aspect-ratio: 1/1;
                border-radius: 6px;
                border: solid 1px grey;
                margin: 1px;
            }
        }
        .box_option{
            align-items: center;
            >label{
                text-align: center;
            }
        }
        .imgdmbox{
            max-height: 400px;
            overflow: hidden;
            img{
                width: 100%;
            }
        }
    }
</style>
<title>POLY Computer ADMIN</title>

<main class="col12">
    <h1 class="full12col"><?php if(isset($item)){echo 'Edit ';}else{echo'Add ';} echo $type; ?></h1>

    <!-- sanpham -->
    <form method="POST" id="editsanpham" class="formadd full12col col12" enctype="multipart/form-data">
        <?php
            if(isset($item) && $type =='sanpham'){
                echo "<input type='text' name='id_sp' hidden value='{$item['id_sanpham']}' >";
            }
        ?>
        <input type="text"     id="ten_sanpham"     name="ten_sp" placeholder="Product Name"   value="<?php if(isset($item) && $type=='sanpham' ){echo $item['ten_sanpham'];}?>"    required>
        <input type="number"   id="gia_sanpham"     name="gia_sp" placeholder="Product Price"  value="<?php if(isset($item) && $type=='sanpham' ){echo $item['gia_sanpham'];}?>"    required>
        <input type="number"   id="giamgia_sanpham" name="giamgia_sp" placeholder="Product Discount" min='0' max="90" value="<?php if(isset($item) && $type=='sanpham' ){echo $item['giamgia'];}?>"  >
        <textarea class="mota_sanpham" name="mota_sanpham" required><?php   if(isset($item) && $type=='sanpham' ){echo $item['mota_sanpham'] ;}?> </textarea>
        <div id="danhmuc">
            <label for="danhmuc">Danh muc:</label>
            <select name="danhmuc"      name="danhmuc" required >
                <?php
                  foreach($allDm as $dm){
                    $check='';
                    if(isset($item)&& $dm['id_danhmuc'] == $item['id_danhmuc']){
                        $check='selected';
                    }
                    echo "<option value='{$dm['id_danhmuc']}' {$check} >{$dm['ten_danhmuc']}</option>";
                  }
                ?>
            </select>
        </div>
        <div id="hang">
            <label for="hang">Hang:</label>
            <select name="hang"            name="hang"   required   >
                <?php
                  foreach($allHang as $hang){
                    $check='';
                    if(isset($item)&& $hang['id_hang'] == $item['id_hang']){
                        $check='selected';
                    }
                    echo "<option value='{$hang['id_hang']}' {$check}>{$hang['ten_hang']}</option>";
                  }
                ?>
            </select>
        </div>
        <hr>
        <!-- them option cho san pham -->
        <?php
            if(isset($item)&& $type=='sanpham'){
                echo "<input type='text' name='id_option' hidden value='{$item['id_option']}' >";
            }
        ?>
        <input type="text" style="grid-column:1/4;" name="optionname" placeholder="Option Title" required value="<?php if(isset($item)&&$type=='sanpham'){echo $item['tieude_option'];}?>" >
        <button id="addoptionpd" onclick="addoption(event,null)">Add option items</button>
        <!-- <div class="full12col col12 box_option">
            <input type="text" style="grid-column: span 10;" name="option_item_name0" placeholder="Opion Name" required>
            <label class="imglabel" style="grid-column: span 2;" for="imgupload">IMG Upload</label>
            <input type="file" id='imgupload' accept="image/*" name="option_item_imgs0[]" multiple required oninput="imgview(this,null)">
            <div class="imgbox full12col">
            </div>
        </div> -->
        <input type="number" hidden  name="numofoptions" id="numofoptions" >
        <input type="submit" name="<?php if(isset($item)){echo 'editproduct';}else{echo 'addproduct';}?>" class="full12col" value="<?php if(isset($item)){echo 'Edit';}else{echo 'Add';}?> Product">
    </form>
    <!-- danh muc -->
    <form action="" id="editdanhmuc" method="POST" class=" full12col col12" enctype="multipart/form-data">
        <div class="full12col imgdmbox">
            <?php if(isset($item)&&$type=='danhmuc'){echo "<img src='contents/imgs/banner/{$item['img']}'>";}?>
        </div>
        <input type="text"    name="ten_danhmuc"  class="full12col" placeholder="Tag Name"     value="<?php if(isset($item)&&$type=='danhmuc'){echo $item['ten_danhmuc'];}?>" required>
        <input type="text"    name="mota_danhmuc" class="full12col" placeholder="Tag describe" value="<?php if(isset($item)&&$type=='danhmuc'){echo $item['mota_danhmuc'];}?>" required>
        <label class="imglabel"   style="grid-column:span 2;"       for="imgdanhmuc"      >IMG Upload</label>
        <input type="text" hidden name="id_dm" value="<?php if(isset($item)&&$type=='danhmuc'){echo $item['id_danhmuc'];}?>">
        <input type="file"    name="danhmucimg"   id='imgdanhmuc'   accept="image/*"  <?php if(!isset($_GET['id'])){echo "required";}?> onchange="imgdanhmucview(this.parentElement.children[0],this)">

        <input type="submit"  name="<?php if(isset($item)){echo 'editdanhmuc';}else{echo 'adddanhmuc';}?>" class="full12col" value="Them Danh Muc">
    </form>

    <!-- hang -->
    <form action="" id="edithang" method="POST" class=" full12col col12" enctype="multipart/form-data">
        <div class="full12col imgdmbox">
            <?php if(isset($item)&&$type=='hang'){echo "<img src='contents/imgs/banner/{$item['img']}'>";}?>
        </div>
        <input type="text"    name="ten_hang"  class="full12col" placeholder="Tên hãng Name" value="<?php if(isset($item)&&$type=='hang'){echo $item['ten_hang'];}?>" required>
        <input type="text"    name="mota_hang" class="full12col" placeholder="Mô tả Hãng" value="<?php if(isset($item)&&$type=='hang'){echo $item['mota_hang'];}?>" required>
        <label class="imglabel"   style="grid-column:span 2;"  for="imghang"      >IMG Upload</label>
        <input type="text" hidden name="id_hang" value="<?php if(isset($item)&&$type=='hang'){echo $item['id_hang'];}?>">
        <input type="file"    name="hangimg"   id='imghang' accept="image/*" <?php if(isset($_GET['id'])){echo "required";}?> onchange="imgdanhmucview(this.parentElement.children[0],this)">
        <input type="submit"  name="<?php if(isset($item)){echo 'edithang';}else{echo 'addhang';}?>" class="full12col" value="Them Danh Muc">
    </form>
</main>
<script>
    var numOfOptions = 1;
    document.querySelector('main').style.marginTop = document.querySelector('nav').offsetHeight +10;
    
    [...document.querySelectorAll('form')].forEach(e=>{
        
        if(e.getAttribute('id')!=`edit${new URLSearchParams(window.location.search).get('type')}`){
            e.remove();
        }
    })

    function imgview(el){
        const inputimgs = el;
        const blockimg = el.parentElement.children[3];
        [...blockimg.children].forEach(e=>{
            e.remove();
        });
        imgs=[...inputimgs.files]
        imgs.forEach(e => {
            let imgtag = document.createElement('img');
            imgtag.src = URL.createObjectURL(e);
            blockimg.append(imgtag);
        });
    }

    function addoption(e,arr){
        if(e instanceof Event){
            e.preventDefault();
        }
        // <div class="full12col col12 box_option">
        //     <input type="text" style="grid-column: span 10;" name="option_item_name${numOfOptions}" placeholder="Opion ${numOfOptions+1} Name">
        //     <label class="imglabel" style="grid-column: span 2;" for="imgupload${numOfOptions}">IMG Upload</label>
        //     <input type="file" id='imgupload${numOfOptions}' name="option_item_imgs${numOfOptions}[]"  accept="image/*" multiple require onchange="imgview(this)">
        //     <div class="imgbox full12col"></div>
        // </div>
        const di = document.createElement('div');
        const inpu = document.createElement('input');
        const label = document.createElement('label');
        const imginput = document.createElement('input');
        const imgbox = document.createElement('div');

        di.classList.add('full12col','col12','box_option');
        di.append(inpu,label,imginput,imgbox);  

        inpu.type='text';
        inpu.name=`option_item_name${numOfOptions}`;
        inpu.placeholder=`Opion ${numOfOptions+1} Name`;
        inpu.required=true;
        inpu.style.gridColumn='span 10';

        label.htmlFor =`imgupload${numOfOptions}`;
        label.style.gridColumn='span 2';
        label.innerText='IMG Upload';
        label.classList.add('imglabel');

        imginput.id=`imgupload${numOfOptions}`;
        imginput.type= 'file';
        imginput.multiple=true;
        imginput.accept='image/*';
        imginput.name=`option_item_imgs${numOfOptions}[]`;
        imginput.oninput = function(){
            imgview(imginput,null);
        };

        imgbox.classList.add('imgbox','full12col');

        if(arr){
            console.log(arr);
            inpu.value=arr['noidung'];
            const opctsid =document.createElement('input')
            opctsid.type='text';
            opctsid.hidden=true;
            opctsid.name=`id_optioncontents${numOfOptions}`;
            opctsid.value=arr['id_optioncontents'];

            for(const e in arr['img']){
                const img = arr['img'][e];
                const imgel = document.createElement('img');
                imgel.src =`contents/imgs/products/${img['id_img']}`;
                imgbox.append(imgel);
            }
            di.append(opctsid);
            inpu.required=false;

        }else{
            imginput.required=true;
        }

        const box = document.getElementById('editsanpham');
        box.insertBefore(di, [...box].at(-1));
        
        document.getElementById('numofoptions').value = numOfOptions;
        console.log(numOfOptions);
        numOfOptions++;
        
    }

    function imgdanhmucview(blockimg,inputimgs){
        [...blockimg.children].forEach(e=>{
            e.remove();
        });
        imgs=[...inputimgs.files]
        imgs.forEach(e => {
            let imgtag = document.createElement('img');
            imgtag.src = URL.createObjectURL(e);
            blockimg.append(imgtag);
        });
    }
    <?php
        if(isset($item)&&$type=='sanpham'){
            // echo $item['tieude_option'];
            // $item['options'];
            foreach($item['options'] as $optionctnsss){
                // $json = json_encode($optionctnsss,JSON_FORCE_OBJECT); 
                echo"addoption(event,$json);";
            }
        }else{
            echo"addoption(event,null);";
        }
    ?>
</script>
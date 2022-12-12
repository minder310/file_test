<?php
include_once "./api/base.php";

$file=find('upload',$_GET['id']);

?>
<!-- 編輯檔案，資料 -->
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
    <ul>
        <li>描述：<input type="text" name="description" value="<?=$file['description'];?>"></li>
        <li>類型:<?=$file['type'];?></li>
        <li>檔案：<input type="file" name="file_name" ></li>
        <li>
            <?php
            if(is_image($file['type'])){
                echo "<img src='./upload/{$file['file_name']}'>";
            }else{
                $icon=dummy_icon($file['type']);
                echo "<img src='./material/{$icon}' style='width:80px'>";

            }
            ?>
        </li>
        <li><input type="submit" value="修改"></li>
    </ul>
</form>
<?php
include_once "base.php";

$file=find("upload",$_GET['id']);

//刪除檔案，語法。
unlink("../upload/".$file['file_name']);

del("upload",$_GET['id']);

to("../upload.php");
?>
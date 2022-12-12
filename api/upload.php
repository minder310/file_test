<!-- 宣告更新，檔案。 -->
<?php
include_once "base.php";
if ($_FILES['file_name']['error'] == 0) {
    $file_str_array = explode(".", $_FILES['file_name']['name']);
    echo $_FILES['file_name']['tmp_name'];
    // move_uploaded_file($_FILES['file_name']['tmp_name'],"../upload".$_FILES['file_name']['tmp_name']);
    // move_uploaded_file($_FILES['file_name']['tmp_name'],"../upload/".$file_name);
    $sub=array_pop($file_str_array);
    // 去查詢array_pop。


    $file_name = date("Ymdhis") . "." . $sub;
    // 宣告一個新的名稱。

    // date(輸入時分秒。)
    // md5是什麼。是隨機現32位元的亂碼。
    // mime type。(去查一下是什麼。)
    insert("upload", [
        'description' => $_POST['description'],
        'size' => $_FILES['file_name']['size'],
        'type' => $_FILES['file_name']['type'],
        'file_name' => $file_name
    ]);
    // 更改名稱。用$file_name
    move_uploaded_file($_FILES['file_name']['tmp_name'], "../upload/" . $file_name);
    $description = $_POST['description'];
    // echo $description;
    // echo "<br>";
    // echo  $file_name;
    // echo "<br>";
    // echo    $_FILES['file_name']['size'];
    // echo "<br>";
    // echo    $_FILES["file_name"]["type"];
    // echo "<br>";
} else {
    // 這裡是沒有改圖片只有改文字，描述檔。
    update('upload',['description'=>$_POST['description']]);
}
header('location:../upload.php?upload=success');

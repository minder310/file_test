<?php
 include_once "base.php";

 if ($_FILES['file_name']['error'] == 0) {
    // 將文件炸開，並宣告為陣列。
    $file_str_array = explode(".", $_FILES['file_name']['name']);
    // 
    echo $_FILES['file_name']['tmp_name'];
    // move_uploaded_file($_FILES['file_name']['tmp_name'],"../upload".$_FILES['file_name']['tmp_name']);
    // move_uploaded_file($_FILES['file_name']['tmp_name'],"../upload/".$file_name);
    $sub=array_pop($file_str_array);
    //------------------- 去查詢array_pop。------------------------------
    $file_name_array=explode(".",$file['file_name']);
    // 用炸開，並且炸開讓名子跟檔名分開。

    $file_name=array_shift($file_name_array).".".$sub;

    $file_name = $file['file_name']. "." . $sub;
    // 宣告一個新的名稱。

    // date(輸入時分秒。)
    // md5是什麼。是隨機現32位元的亂碼。
    // mime type。(去查一下是什麼。)
    insert("upload", [
        'description' => $_POST['description'],
        'file_name'=>$file_name,
        'size' => $_FILES['file_name']['size'],
        'type' => $_FILES['file_name']['type'],
    ],$_GET['id']);
    // 更改名稱。用$file_name
    move_uploaded_file($_FILES['file_name']['tmp_name'], "../upload/" . $file_name);
    update('upload',[],$_POST['id']);
    // $description = $_POST['description'];
    // echo $description;
    // echo "<br>";
    // echo  $file_name;
    // echo "<br>";
    // echo    $_FILES['file_name']['size'];
    // echo "<br>";
    // echo    $_FILES["file_name"]["type"];
    // echo "<br>";
    header('location:../upload.php?upload=success');
} else {
    echo "上傳失敗請檢察檔案是否正確，請檢查檔案，或請聯絡管理員。";
}
?>
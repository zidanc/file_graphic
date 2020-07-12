<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <h1 class="header">檔案上傳練習</h1>
 <!----建立你的表單及設定編碼----->
<form action="catch_file.php" method="post" enctype="multipart/form-data">
    <input type="file" name="pp" id="img"><br>
    <input type="text" name="desc"><br>
    <button type="submit" name="" id="">送出</button>

</form>


<!----建立一個連結來查看上傳後的圖檔---->  
<!-- 本php檔案內透過<form action="B.php">送出到B.php，B.php執行完上傳動作後，將檔案路徑傳回給本php檔案。 -->

<?php
if(!empty($_GET['filepath'])){
    $name=$_GET['filepath'];
?>    

<img src="img/<?=$name;?>" style="width:200px;">        <!-- 此方式才安全，判斷非空值，才會顯示此圖；並且網址若刻意打uploaded/img/，也不會讓別人看到任何圖片了。-->

<?php
}   
// }else{
    // $name="";            這種方式不安全，因為如果上傳空名稱過來，到時候圖像就會連結到img/這一層，等於所有圖片都敞開給別人下載了。
// }
?>


</body>
</html>
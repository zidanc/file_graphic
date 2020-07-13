<style>
        body{
            margin:0;
            box-sizing: border-box;
            padding: 10px;
        }
</style>

<?php

include_once "base.php";

if(!empty($_GET['id'])){
  $row=find("file_info",$_GET['id']);     //判斷前一頁manage.php帶過來網頁傳值$_GET['id']，撈出資料以供下方form預設顯示用。

}

if(!empty($_POST['submitname'])){
  $source=find("file_info",$_POST['id']);    //若有更新，判斷form 以post傳出來的更新資料，對應欄位有無需要更新。
  
  if(!empty($_FILES['ww']['tmp_name'])){
      switch ($_FILES['ww']['type']) { 
        case 'image/jpeg':
          $sub=".jpg";
          break;
        case 'image/png':
          $sub=".png";
          break;
        case 'image/gif':
          $sub=".gif";
          break;
      }

      $animal=['clownfish','shark','dolphin','whale'];
      $name=$animal[rand(0,3)].date("Ymdhis").$sub;

  }


  $source['filename']=$name;
  $source['type']=$_FILES['ww']['type'];
  $source['path']="img/".$name;
  
  unlink($source['path']);
  move_uploaded_file($_FILES['ww']['tmp_name'],"img/$name");

}

$source['note']=$_POST['note'];

save("file_info",$source);
to("manage.php");


?>

<img src="<?=$row['path'];?>" style="width:200px;">

<form action="update_file.php" method="post" enctype="multipart/form-data">
    <input type="file" name="ww"><br>   
    <!-- id="" javascript才會用到 -->
    <br>
    <input type="text" name="note" value="<?=$row['note'];?>"><br>
    <br>
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <input type="submit" name="submitname" value="送出">
</form>
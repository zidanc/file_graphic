<?php
include_once "base.php";

if($_FILES['pic']['error']==0){            //此為第二種判斷方式。

  switch ($_FILES['pic']['type']) { 
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
  
  $animal=['cat','dog','lizard','owl'];
  $name=$animal[rand(0,3)]."zd".date("Ymdhis").$sub;


  // move_uploaded_file($_FILES['pic']['tmp_name'],"img/".$_FILES['pic']['name']);
  move_uploaded_file($_FILES['pic']['tmp_name'],"img/".$name);

  //把資料寫到資料庫去。正確的應該是要先判斷這筆資料是否已經寫入過。
  $data=[
    'filename'=>$name,
    'type'=>$_FILES['pic']['type'],
    'note'=>$_POST['note'],
    'path'=>"img/".$name,
    'album'=>$_POST['album']
  ];

  save("file_info",$data);

  header("location:manage.php");
}



?>
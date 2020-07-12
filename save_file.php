<?php
include_once "base.php";

// $_FILES：php的系統變數，專門接收<form表單><input type="file">送過來的資料，為陣列的型式。

echo "<pre>";print_r($_FILES);"</pre>";

//先判斷檔案上傳有無問題，再執行後續動作。
//if(!empty($_FILES['pp']['tmp_name']))   方式有兩種，此為第一種。
if($_FILES['pp']['error']==0){            //此為第二種判斷方式。

  switch ($_FILES['pp']['type']) { 
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


  // move_uploaded_file($_FILES['pp']['tmp_name'],"img/".$_FILES['pp']['name']);
  move_uploaded_file($_FILES['pp']['tmp_name'],"img/".$name);

  //把資料寫到資料庫去。正確的應該是要先判斷這筆資料是否已經寫入過。
  $data=[
    'filename'=>$name,
    'type'=>$_FILES['pp']['type'],
    'note'=>$_POST['note'],
    'path'=>"img/".$name
  ];

  save("file_info",$data);

  header("location:manage.php");
}

?>



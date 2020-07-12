<?php
date_default_timezone_set("Asia/Taipei");
// $_FILES：php的系統變數，專門接收<form表單><input type="file">送過來的資料，為陣列的型式。

echo "<pre>";print_r($_FILES);"</pre>";

echo $_FILES['pp']['name'];

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
  


   $name=date("Ymdhis").$sub;

  // move_uploaded_file($_FILES['pp']['tmp_name'],"img/".$_FILES['pp']['name']);
  move_uploaded_file($_FILES['pp']['tmp_name'],"img/".$name);
  header("location:upload.php?filepath=$name");
}

?>

<img src="<?=$_FILES['pp']['tmp_name'];?>">  一開始暫存路徑，但無法正常顯示是因為附檔名為.tmp<br>
<img src="<?="img/".$_FILES['pp']['name'];?>">
<img src="<?="img/".$name;?>">


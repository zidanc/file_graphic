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

  $thumb_path="thumb/".$name;
  $source_path="img/".$name;

  $img_info=getimagesize($source_path);    //此函式回傳一陣列
  // echo "<pre>";print_r($img_info);"</pre>";

  $ratio=0.2;
  $img_w=$img_info[0]*$ratio;
  $img_h=$img_info[1]*$ratio;

  $thumb_img=imagecreatetruecolor($img_w,$img_h);     //回傳為一Resource，所以echo應是無法顯示的。
  // echo $thumb_img;                                    //結果測試echo得到的是一個沒有實質幫助的簡短語句resource id=5;
  //接著，把原本圖取出(同時必須利用檔案類型，根據不同的檔案類型，開啟不同的資源Resource)，然後縮放。

  switch ($img_info['mime']) { 
    case 'image/jpeg':
      $source_img=imagecreatefromjpeg($source_path);
      break;
    case 'image/png':
      $source_img=imagecreatefrompng($source_path);
      break;
    case 'image/gif':
      $source_img=imagecreatefromgif($source_path);
      break;
  }

  //縮放完成後，仍是一個資源Resource狀態，暫存在記憶體內。
  imagecopyresampled($thumb_img,$source_img,0,0,0,0,$img_w,$img_h,$img_info[0],$img_info[1]);   

  switch ($img_info['mime']) { 
    case 'image/jpeg':
      $source_img=imagejpeg($thumb_img,$thumb_path);    //imagejpeg — Output image to browser or file
      break;                                            //imagejpeg(由圖像創建函數(例如imagecreatetruecolor())返回的圖像資源。)
    case 'image/png':
      $source_img=imagepng($thumb_img,$thumb_path);
      break;
    case 'image/gif':
      $source_img=imagegif($thumb_img,$thumb_path);
      break;
  }


  header("location:image.php");
}



?>
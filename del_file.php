<?php
include_once "base.php";

$id=$_GET['id'];

$file=find("file_info",$id); //先找出資料庫裡該筆資料的所有資訊，因為我們等會兒會需要它的路徑來做刪除本機圖片檔。

// unlink(檔案路徑,[type類型]);
unlink($file['path']);    //順序： 先將硬碟空間的圖片檔刪除，再刪資料庫的圖片資料比較正確。以免撈不出你需要該圖檔資訊的路徑。但因為這裡我們有先find它的路徑，所以順序就不是問題了。


del("file_info",$id);

to("manage.php");



?>
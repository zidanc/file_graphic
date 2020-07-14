<style>
body{
  box-sizing: border-box;
  margin: 0;
}

img{
  /* display:inline-block; */
  position: relative;
  padding: 15px;
  border: 1px solid #ccc;
  box-shadow: inset 0 0 8px #ccc;
  margin: 10px 5px;
}
img::after{
  content:"";
  position: absolute;
  width: 200px;
  height: 150px;
  left: 40%;
  top: 20%;
  background: #ccc;
  z-index: 9;
}

</style>

<?php
include_once "base.php";

if(!empty($_GET['type'])){
  $album=["album"=>$_GET['type']];
}else{
  $album="";
}

$images=all("file_info",$album);

?>

<a href="?type=1">美食</a>
<a href="?type=2">旅遊</a>
<a href="?type=3">寵物</a>
<a href="?">全部</a>

<hr>
<?php
foreach($images as $img){
  echo "<img src='".$img['path']."' style='width:200px;'>";
}

 



?>
<style>
body{
  box-sizing: border-box;
  margin: 0;
}
a{
  padding: 10px;
  line-height: 2rem;
  text-decoration: none;
  position: relative;
}
a:hover{
  border-bottom: 5px solid orange;
  border-radius: 5px;
}
a::after{
  content:"";
  position: absolute;
  background: linear-gradient(to right bottom, blue, purple);
  left: 0;
  right: 0;
  top: -10px;
  bottom: -10px;
  opacity: 0.3;
  border: 1px solid orange;
  border-radius: 20px;
}
img{
  /* display:inline-block; */
  position: relative;
  padding: 15px;
  border: 1px solid #ccc;
  box-shadow: inset 0 0 8px #ccc;
  margin: 10px 5px;
}
/* img::after{
  content:"";
  position: absolute;
  width: 200px;
  height: 150px;
  left: 40%;
  top: 20%;
  background: #ccc;
  z-index: 9;
} */
.layout{
  padding: 20px 0 10px 10px;
}
.bar:hover{
  background: yellow;
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

<a href="?type=1" class="bar">美食</a>
<a href="?type=2" class="bar">旅遊</a>
<a href="?type=3" class="bar">寵物</a>
<a href="?" class="bar">全部</a>
<div class="layout"><a href="manage.php" style="border:1px solid orange; border-radius:20px;">回管理頁面</a></div>

<hr>
<?php
foreach($images as $img){
  echo "<img src='".$img['path']."' style='width:200px;'>";
}

 



?>
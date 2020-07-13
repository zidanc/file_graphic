<style>
a{
  text-decoration: none;
}

.btn{
  text-align:center;
  line-height: 2rem;
  display: inline-block;
  border: 1px solid orange;
  background: orange;
  width: 4rem;
  height: 2rem;
  border-radius: 20px;
  position: relative;
}
.btn:hover{
  background:orangered;
  transition: background 1s ease-in-out 0;
}

.btn::after{
  position: absolute;
  width: 4rem;
  height: 2rem;
  border-radius: 20px;
  background: linear-gradient(to right top, yellow, hotpink);
  opacity: 0.3;
  z-index: 99;
}

</style>
<h4>確認刪除嗎?</h4>
<a href="del_file.php?id=<?=$_GET['id'];?>"><div class="btn">Yes</div></a>
<a href="manage.php"><div class="btn">No</div></a>
<?php
/*
 * 1.建立資料庫及資料表來儲存檔案資訊
 * 2.建立上傳表單頁面
 * 3.取得檔案資訊並寫入資料表
 * 4.製作檔案管理功能頁面
 */
include_once "base.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案管理功能</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            margin:0;
            box-sizing: border-box;
            padding: 10px;
        }
        table{
            margin: auto auto;
            border-collapse: collapse;
            border-top: 2px solid #999;
            border-left: none;
            border-right: none;
            border-bottom: 2px solid #999;
        }
        td{
            padding: 0.3rem 2rem;

        }
        tr{
            border-bottom: 1px solid #ccc;
        }
        tr:nth-child(odd){
            background: #ccc;
            color: white;
            text-shadow: 0 0 4px #333;
        }
        .layout{
            display: inline-block;
        }
        a{
            border: 1px solid #666;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<h1 class="header">檔案管理練習</h1>
<!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->

<form action="save_file.php" method="post" enctype="multipart/form-data">
    檔案:<input type="file" name="pp" id=""><br>
    <br>
    說明:<input type="text" name="note" placeholder="註解於此"><br>
    <br>
    
    <div class="layout">相簿歸類:
        <select name="album">
                <option value="1">美食</option>        
                <option value="2">旅遊</option>
                <option value="3">寵物</option>
        </select>
        <div><a href="album.php">相簿連結</a></div>
    </div>
    <br>
    <input type="submit" value="送出">
</form>
<!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->
<p style="padding:1rem 0rem 0.2rem 0rem;">由第一筆my_motto可以看出，圖片檔的資訊是進資料庫(Database MySQL)。</p>
<p style="padding:0.2rem 0rem 1rem 0rem;">雖然type當時寫入錯誤，但因為圖片檔img不是存入資料庫，是移到本機(Web Server Apache)的img/空間(<img src="">路徑正確)，所以仍可以正常顯示。</p>
<p style="padding:0.2rem 0rem 1rem 0rem;">找出資料表的資料將其刪除，並且同時也要找出硬碟裡該筆資料的檔案將之刪除，否則圖檔會累積越來越多到把硬碟塞爆。</p>
<table>
    <tr>
        <th>預覽</th>
        <th>檔名</th>
        <th>路徑</th>
        <th>類別</th>
        <th>相簿</th>
        <th>說明</th>
        <th>上傳時間</th>
        <th>操作</th>
    </tr>
<?php
$all=all("file_info");
foreach ($all as $key => $value){
?>
    <tr>
        <td><img src="<?=$value['path'];?>" style="width:200px;"></td>
        <td><?=$value['filename'];?></td>
        <td><?=$value['path'];?></td>
        <td><?=$value['type'];?></td>
        <td><?=$value['album'];?></td>
        <td><?=$value['note'];?></td>
        <td><?=$value['upload_time'];?></td>
        <td>
            <div style="padding:0 0 0.5rem 0; display:inline-block;"><a href="confirm.php?id=<?=$value['id'];?>" style="text-shadow:none;">刪除</a></div>
            <div style="padding:0.5rem 0 0 0; display:inline-block;"><a href="update_file.php?id=<?=$value['id'];?>" style="text-shadow:none;">更新</a></div>
        </td>
    </tr>

<?php
}
?>    
</table>



</body>
</html>
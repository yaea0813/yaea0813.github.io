<?php
if ($_FILES["file"]["error"] > 0) {
	echo("error");
	} else {
	echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
	echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
	echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
	echo "暫存名稱: " . $_FILES["file"]["tmp_name"];
	echo'<br>';
	if (file_exists("../htdocs".$_FILES["file"]["name"])) {
		echo'檔案已存在 請勿重複上傳';
	} else {
		$filename=$_FILES["file"]["name"];
		$filelocation='../htdocs/'.$filename;
		move_uploaded_file($_FILES["file"]["tmp_name"],"../htdocs/".$_FILES["file"]["name"]);
		include('connect.php');
		$save="insert into picture(name,location) values ('$filename','$filelocation')";

		$reslut=mysqli_query($con,$save);
		
		if (!$reslut) {
			echo("I fail");//如果sql執行失敗輸出錯誤
		              } else {
								echo "註冊成功";//成功輸出註冊成功
				  				header("refresh:3;url=all_image.html");
	     					 }
			}	
		mysqli_close($con);
	 //關閉資料庫
	}

?>
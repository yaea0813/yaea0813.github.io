<?php
header("Content-Type: text/html; charset=utf8");
if (!isset($_POST['submit'])) {
	exit("錯誤執行");
}//判斷是否有submit操作
$name=$_POST['name'];//post獲取表單裡的name
$password=$_POST['password'];//post獲取表單裡的password
include('connect.php');//連結資料庫
$q="insert into user(id,username,password) values (null,'$name','$password')";//向資料庫插入表單傳來的值的sql
//mysqli_query( $con, "SET NAMES 'utf8'");
$reslut=mysqli_query($con,$q);//執行sql
if (!$reslut) {
	echo("I fail");//如果sql執行失敗輸出錯誤
} else {
	echo "註冊成功";//成功輸出註冊成功
	header("refresh:3;url=index.html");
}
mysqli_close($con);//關閉資料庫
?>
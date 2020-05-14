<?php
$server="localhost";//主機
$db_username="root";//你的資料庫使用者名稱
$db_password="121336";//你的資料庫密碼
$con = mysqli_connect($server,$db_username,$db_password);//連結資料庫
if (!$con) {
	die("can't connect".mysql_error());//如果連結失敗輸出錯誤
}
echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($con) . PHP_EOL;
if ( !mysqli_select_db($con, "test")) {
	die ("無法選擇資料庫");
}
// 設定連線編碼
mysqli_query( $con, "SET NAMES 'utf8'");
//mysqli_select_db('test',$con);
//mysql_select_db('test',$con);//選擇資料庫（我的是test）
?>
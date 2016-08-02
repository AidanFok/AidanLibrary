<?php session_start(); ?>
<!--typo start here-->
<?php 
error_reporting(E_ALL ^ E_DEPRECATED);

$con=mysql_connect("localhost","root","");
if (!$con){
	die('Could not connect: '.mysql_error());
}

mysql_select_db("library",$con);

$sql="select *
from admin
where admin_ID='$_POST[a_id]' and password='$_POST[a_pwd]'";

$result=mysql_query($sql);

if (mysql_fetch_array($result)){
	$_SESSION['aid']=$_POST["a_id"];
	header("Location: admin.php"); 
	exit;
}
else {
	echo "<script>alert('ID或密码错误');window.location.href='admin_login.php';</script>";
	exit;
}

mysql_close($con);

?> 
<!--typo end here-->

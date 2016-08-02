<?php session_start(); ?>
<html>
<body>

<?php 
error_reporting(E_ALL ^ E_DEPRECATED);

$con=mysql_connect("localhost","root","");
if (!$con){
	die('Could not connect: '.mysql_error());
}

mysql_select_db("library",$con);

$sql="select *
from user
where user_ID='$_POST[u_id]' and password='$_POST[u_pwd]'";

$result=mysql_query($sql);

if (!$result){
  mysql_close($con);
  exit;
}

if (mysql_fetch_array($result)){
	$_SESSION['uid']=$_POST["u_id"];
	header("Location: user.php"); 
	exit;
}
else {
	echo "<script>alert('借书证号或密码错误');window.location.href='user_login.php';</script>";
	exit;
}

mysql_close($con);


?> <br />

<a href="user_login.html">返回登陆界面</a>
<br />
<a href="index.html">返回主页</a>

</body>
</html>
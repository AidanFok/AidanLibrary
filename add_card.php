<html>
<body>

<?php 

if ($_POST['u_id']==""){
	echo "<script>alert('借书证号不能为空');window.location.href='admin.php';</script>";
	exit;
}
if ($_POST['u_pwd']==""){
	echo "<script>alert('密码不能为空');window.location.href='admin.php';</script>";
	exit;
}
if ($_POST['u_name']==""){
	echo "<script>alert('姓名不能为空');window.location.href='admin.php';</script>";
	exit;
}
if ($_POST['u_type']!=""){
	if ($_POST['u_type']!="teacher" and $_POST['u_type']!="student"){
		echo "<script>alert('类型只能为teacher,student或空');window.location.href='admin.php';</script>";
		exit;
	}
}

error_reporting(E_ALL ^ E_DEPRECATED);

$con=mysql_connect("localhost","root","");
if (!$con){
	die('Could not connect: '.mysql_error());
}

mysql_select_db("library",$con);

$sql="select *
from user
where user_ID='$_POST[u_id]'";

$result=mysql_query($sql);

$row = mysql_fetch_array($result);
if ($row){
	mysql_close($con);
	echo "<script>alert('此借书证已经存在');window.location.href='admin.php';</script>";
}
else {
	$sql="insert into user value('$_POST[u_id]','$_POST[u_pwd]','$_POST[u_name]','$_POST[u_dept]','$_POST[u_type]')";
	mysql_query($sql);
	mysql_close($con);
	echo "<script>alert('添加成功');window.location.href='admin.php';</script>";
}

?> <br />

</body>
</html>
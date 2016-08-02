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
where user_ID='$_POST[u_id]'";

$result=mysql_query($sql);

$row = mysql_fetch_array($result);
if ($row){
	$sql="select * from borrow where user_ID='$_POST[u_id]'";
	$result2 = mysql_query($sql);
	$row2 = mysql_fetch_array($result2);
	if ($row2){
		mysql_close($con);
		echo "<script>alert('这个借书证还有书没还');window.location.href='admin.php';</script>";
		exit;
	}
	else{
		$sql="delete from user where user_ID='$_POST[u_id]'";
		mysql_query($sql);
		mysql_close($con);
		echo "<script>alert('删除成功');window.location.href='admin.php';</script>";
	}
}
else {
	mysql_close($con);
	echo "<script>alert('此借书证不存在');window.location.href='admin.php';</script>";
}

?> <br />

</body>
</html>
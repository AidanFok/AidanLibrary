<html>
<body>

<?php 
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

$con=mysql_connect("localhost","root","");
if (!$con){
	die('Could not connect: '.mysql_error());
}

mysql_select_db("library",$con);

$sql="select *
from borrow
where user_ID='$_SESSION[uid]' and book_ID='$_POST[bk_id]'";

$result=mysql_query($sql);

if ($row = mysql_fetch_array($result)){
	mysql_query("update book set number=number+1 where book_ID='$_POST[bk_id]'");
	mysql_query("delete from borrow where user_ID='$_SESSION[uid]' and book_ID='$_POST[bk_id]'");
	mysql_close($con);
	echo "<script>alert('还书成功');window.location.href='user.php';</script>";
}
else {
	mysql_close($con);
	echo "<script>alert('你没借这本书');window.location.href='user.php';</script>";
}

?> <br />

</body>
</html>
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


$sql="select number
from book
where book_ID='$_POST[bk_id]'";

$result=mysql_query($sql);

if ($row= mysql_fetch_array($result)){
	if ($row['number']>0){
		$result=mysql_query("select * from borrow where user_ID='$_SESSION[uid]' and book_ID='$_POST[bk_id]'");
		if (mysql_fetch_array($result)){
			mysql_close($con);
			echo "<script>alert('你已经借了这本书');window.location.href='user.php';</script>";
		}
		else {
			mysql_query("update book set number=number-1 where book_ID='$_POST[bk_id]'");
			$date=date('Y-m-d');
			mysql_query("insert into borrow value('$_POST[bk_id]','$_SESSION[uid]','$date','','3130100678')");
			mysql_close($con);
			echo "<script>alert('借书成功');window.location.href='user.php';</script>";
		}
	}
	else {
		$sql="select max(borrow_day)
		from borrow
		where book_ID='$_POST[bk_id]'";
		$result=mysql_query($sql);
		$row = mysql_fetch_array($result);
		$old_date=$row['max(borrow_day)'];
		$new_date=date('Y-m-d',strtotime("$old_date + 1 month"));
		mysql_close($con);
		echo "<script>alert('库存不足，最近归还时间为$new_date');window.location.href='user.php';</script>";
	}
}
else {
	mysql_close($con);
	echo "<script>alert('查无此书');window.location.href='user.php';</script>";
}
?> <br />

</body>
</html>
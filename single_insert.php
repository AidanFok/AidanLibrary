<html>
<body>

<?php 
//error_reporting(~E_ALL);
error_reporting(E_ALL ^ E_DEPRECATED);

if ($_POST['ID']==""){
	echo "<script>alert('书号不能为空');window.location.href='admin.php';</script>";
	exit;
}
if ($_POST['name']==""){
	echo "<script>alert('书名不能为空');window.location.href='admin.php';</script>";
	exit;
}
if ($_POST['price']==""){
	echo "<script>alert('价格不能为空');window.location.href='admin.php';</script>";
	exit;
}
if (empty($_POST['num'])){
	echo "<script>alert('数量不能为空');window.location.href='admin.php';</script>";
	exit;
}

$con=mysql_connect("localhost","root","");
if (!$con){
	die('Could not connect: '.mysql_error());
}

mysql_select_db("library",$con);

if (empty($_POST['year'])) $_POST['year']=1700;

$sql="select *
from book
where book_ID='$_POST[ID]' and type='$_POST[type]' and name='$_POST[name]' and publisher='$_POST[publisher]' and year=$_POST[year] and author='$_POST[author]' and price='$_POST[price]' ";
$result=mysql_query($sql);
//if (!$result) die('Wrong:   '.mysql_error());
$row = mysql_fetch_array($result);
if ($row){
	$sql="update book
	set number=number+$_POST[num]
	where book_ID='$_POST[id]'";
	mysql_query($sql);
	$sql="update book
	set amount=amount+$_POST[num]
	where book_ID='$_POST[id]'";
	mysql_query($sql);
	echo "<script>alert('增加数量成功');window.location.href='admin.php';</script>";
	mysql_close($con);
  	exit;
}

$sql="insert into book value('$_POST[ID]','$_POST[type]','$_POST[name]','$_POST[publisher]',$_POST[year],'$_POST[author]',$_POST[price],$_POST[num],$_POST[num])";

if (!mysql_query($sql)){
  echo "<script>alert('与已有图书书号重复');window.location.href='admin.php';</script>";
  mysql_close($con);
  exit;
}

mysql_close($con);
echo "<script>alert('入库成功');window.location.href='admin.php';</script>";

?> <br />

</body>
</html>
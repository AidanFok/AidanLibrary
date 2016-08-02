<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con=mysql_connect("localhost","root","");
if (!$con){
  die('Could not connect: '.mysql_error());
}
mysql_select_db("library",$con);

$flag=1;

$myfile = fopen($_FILES["bk_file"]["tmp_name"], "r") or die("Unable to open file!");
while(!feof($myfile)) {
  $arr=explode(",",fgets($myfile),8);

  $sql="select *
  from book
  where book_ID='$arr[0]' and type='$arr[1]' and name='$arr[2]' and publisher='$arr[3]' and year=$arr[4] and author='$arr[5]' and price=$arr[6]";
  $result=mysql_query($sql);
  $row = mysql_fetch_array($result);
  if ($row){
    $sql="update book
    set number=number+$arr[7]
    where book_ID='$arr[0]'";
    mysql_query($sql);
    $sql="update book
    set amount=amount+$arr[7]
    where book_ID='$arr[0]'";
    mysql_query($sql);
  }
  else {
    $sql="insert into book value('$arr[0]','$arr[1]','$arr[2]','$arr[3]',$arr[4],'$arr[5]',$arr[6],$arr[7],$arr[7])";
    if (!mysql_query($sql)) $flag=0;
  }
}
fclose($myfile);

mysql_close($con);
if ($flag==1) echo "<script>alert('全部入库成功');window.location.href='admin.php';</script>";
else echo "<script>alert('部分入库成功');window.location.href='admin.php';</script>";
?>
<?php
error_reporting(0);
$subject=$_POST[subject];
$message=$_POST[message];
$name=$_POST[name];
$from=$_POST[from];
$to = "3130100678@zju.edu.cn";
$headers = "From: $name,$from";
mail($to,$subject,$message,$headers);
echo "<script>alert('发送成功');window.location.href='contact.php';</script>";
?>
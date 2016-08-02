
<!DOCTYPE HTML>
<html>
<head>
<title>Administrater login</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta name="keywords" content="Civil Engineer Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Squada+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700,900' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
</head>
<body>
<!--banner start here-->
<div class="banner-two">
  <div class="header">
	<div class="container">
		 <div class="header-main">
				<div class="logo">
				<h1><a href="index.php">Aidan Fok的图书管理系统</a></h1>
				</div>
				<div class="top-nav">
					<span class="menu"> <img src="images/icon.png" alt=""/></span>
				 <nav class="cl-effect-1">
					<ul class="res">
					    <li><a href="index.php" class="active">首页</a></li> 
					   <li><a href="admin_login.php">管理员登陆</a></li> 
						<li><a href="user_login.php">用户登陆</a></li> 
						<li><a href="find.php">查找书籍</a></li> 
						<li><a href="contact.php">Contact</a></li> 
				   </ul>
				 </nav>
					<!-- script-for-menu -->
						 <script>
						   $( "span.menu" ).click(function() {
							 $( "ul.res" ).slideToggle( 300, function() {
							 // Animation complete.
							  });
							 });
						</script>
		        <!-- /script-for-menu -->
				</div>
			 <div class="clearfix"> </div>
		 </div>
	  </div>
	 </div>
 </div>
<!--banner end here-->
</br>
<div class="container">
<?php
	session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		$con=mysql_connect("localhost","root","");
		if (!$con){
			die('Could not connect: '.mysql_error());
		}

		mysql_select_db("library",$con);

        if (isset($_SESSION['aid']))
        {
		$sql="select name
		from admin
		where admin_ID='$_SESSION[aid]'";

		$result=mysql_query($sql);
		$row = mysql_fetch_array($result);

		echo "你好，";
		echo $row['name'];}

		else if(isset($_SESSION['uid'])){
		$sql="select name
		from user
		where user_ID='$_SESSION[u≈id]'";

		$result=mysql_query($sql);
		$row = mysql_fetch_array($result);

		echo "你好，";
		echo $row['name'];}

        else{echo "你好，游客";}
		mysql_close($con);
    ?>
    </div>
<!--typo start here-->
<div class="typrography">
	<div class="container">
	<div class="page">
		<h3 class="typo1">查找书籍</h3>
		</div>
	<!--Forms-->
	<!--书目查询-->
<div class="container">
<div class="bs-example" data-example-id="simple-horizontal-form">
	<form name="input" action="find.php" method="post">
	<legend>书目查询</legend>
      <div class="form-group">
        <label class="col-sm-1 control-label">书号</label>
        <div class="col-sm-5">
       <input type="text" name="ID" id="ID" class="form-control" placeholder="书号"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">类别</label>
        <div class="col-sm-5">
       <input type="text" name="type" id="type" class="form-control" placeholder="类别"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">书名</label>
        <div class="col-sm-5">
       <input type="text" name="name" id="name" class="form-control" placeholder="书名"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">出版社</label>
        <div class="col-sm-5">
       <input type="text" name="publisher" class="form-control" placeholder="出版社"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">作者</label>
        <div class="col-sm-5">
       <input type="text" name="author" class="form-control" placeholder="作者"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">数量</label>
        <div class="col-sm-5">
       <input type="number" name="num" class="form-control" placeholder="数量"> <br/>
        </div>
      </div>
        <div class="form-group">
        <label class="col-sm-1 control-label">年份</label>
        <div class="col-sm-5">
       <input type="text" name="y_low" id="y_low" class="form-control" placeholder="年份"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">至</label>
        <div class="col-sm-5">
       <input type="text" name="y_high" id="y_high" class="form-control" placeholder="年份"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">价格</label>
        <div class="col-sm-5">
       <input type="text" name="p_low" class="form-control" placeholder="价格"> 
        </div>
        </div>
          <div class="form-group">
        <label class="col-sm-1 control-label">至</label>
        <div class="col-sm-5">
       <input type="text" name="p_high" class="form-control" placeholder="价格"> <br/>
        </div>
        </div>
        <br/>
       <legend>选择排序方式</legend>
		<input type="radio" name="order" value="book_ID"checked>书号&nbsp
		<input type="radio" name="order" value="type">类别&nbsp
		<input type="radio" name="order" value="name" >书名&nbsp
		<input type="radio" name="order" value="publisher">出版社&nbsp
		<input type="radio" name="order" value="year">年份&nbsp
		<input type="radio" name="order" value="author">作者&nbsp
		<input type="radio" name="order" value="price">价格&nbsp
		<input type="radio" name="order" value="number">库存&nbsp  

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <br/>
          <button type="submit" class="btn btn-default">查询</button>
        </div>
      </div>
	</form> 
<br/>
</div>
</div>
<br/>
<br/>
	<!--查找结果-->
	<div class="container">
 	<legend>查找结果</legend>
<div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>书号</th>
          <th>类别</th>
          <th>书名</th>
          <th>出版社</th>
          <th>年份</th>
          <th>作者</th>
          <th>价格</th>
          <th>库存</th>
          <th>总藏书量</th>
        </tr>
      </thead>
     <tbody>
    <?php 
error_reporting(0);
$con=mysql_connect("localhost","root","");
if (!$con){
	//die('Could not connect: '.mysql_error());
}

mysql_select_db("library",$con);

if (empty($_POST['p_low'])) $_POST['p_low']=0;
if (empty($_POST['p_high'])) $_POST['p_high']=99999999;
if (empty($_POST['y_low'])) $_POST['y_low']=0;
if (empty($_POST['y_high'])) $_POST['y_high']=9999;


$sql="select *
from book
where book_ID like '%" .$_POST['ID']. "%'
and type like '%" .$_POST['type']. "%'
and name like '%" .$_POST['name']. "%'
and publisher like '%" .$_POST['publisher']. "%'
and number like '%" .$_POST['num']. "%'
and year>=$_POST[y_low] and year<=$_POST[y_high]
and author like '%" .$_POST['author']. "%'
and price>=$_POST[p_low] and price<=$_POST[p_high]
order by ".$_POST['order'];
$result=mysql_query($sql);
$count=0;
while($row = mysql_fetch_array($result))
{$count++;
echo "<tr>"; 
echo "<th>"."$count"."</th>";
echo "<td>" . $row['book_ID'] . "</td>";
echo "<td>" . $row['type'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['publisher'] . "</td>";
echo "<td>" . $row['year'] . "</td>";
echo "<td>" . $row['author'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['number'] . "</td>";
echo "<td>" . $row['amount'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysql_close($con);


?> 
     
      </tbody>
    </table>
  </div>
<br/>
<br/>
	</div>
	<!--//forms-->
</div>
</div>
<!--typo end here-->
<!--footer start here-->
<div class="footer">
	<div class="container">
		<div class="footer-main">
				<div class="col-md-4 ftr-gd">
					<h3>Follow me</h3>
					<ul>
						<li><a href="https://www.facebook.com/aidan.fok" class="fa"> </a></li>
						<li><a href="https://www.twitter.com/aidanfok" class="tw"> </a></li>
						<li><a href="https://myaccount.google.com" class="g"> </a></li>
					</ul>
				</div>
				<div class="col-md-4 ftr-gd">
					<h3>My girl</h3>
					<ul>
					<img src="images/m4.jpg" align="center"height="200"></a>
					</ul>
				</div>
				<div class="col-md-4 ftr-gd">
					<h3>Address</h3>
					<p>Dorm 7-2074, Yuquan Campus,</p>
					<p>Zhejiang University, Hangzhou,</p>
					<p>310027, P.R.China</p>
					<p>Phone :+86-186-6819-8693</p>
				</div>
			<div class="clearfix"> </div>
		</div>
		<script type="text/javascript">
										$(document).ready(function() {
											
											$().UItoTop({ easingType: 'easeOutQuart' });
											
										});
									</script>
						<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

	</div>
</div>
<!--footer end here-->
</body>
</html>
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
 <form name="input" action="logout.php" method="post">

<?php
	session_start();
	if (isset($_SESSION['aid'])==0){
		echo "<script>alert('请先登录');window.location.href='admin_login.php';</script>";
		exit;
	}
	else {
		error_reporting(E_ALL ^ E_DEPRECATED);
		$con=mysql_connect("localhost","root","");
		if (!$con){
			die('Could not connect: '.mysql_error());
		}

		mysql_select_db("library",$con);

		$sql="select name
		from admin
		where admin_ID='$_SESSION[aid]'";

		$result=mysql_query($sql);
		$row = mysql_fetch_array($result);

		echo "你好，".$row['name']."&nbsp&nbsp&nbsp&nbsp";
		mysql_close($con);
	}
    ?>
    		<input type="submit" class="btn btn-danger" name="button" value="注销" />
        </form>
    </div>
   

<!--typo start here-->
<div class="typrography">
	<div class="container">
	<div class="page">
		<h3 class="typo1">管理员界面</h3>
		</div>
	<!--Forms-->
	<!--单书入库-->
<div class="container">
<div class="bs-example" data-example-id="simple-horizontal-form">
	<form name="input" action="single_insert.php" method="post">

	<br />
	<font color="red">* 必填字段</font>
	<br />
	<legend>单本入库</legend>
      <div class="form-group">
        <label class="col-sm-1 control-label">书号</label>
        <div class="col-sm-5">
       <input type="text" name="ID" class="form-control" placeholder="书号"> <font color="red"> *</font><br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">类别</label>
        <div class="col-sm-5">
       <input type="text" name="type" class="form-control" placeholder="类别"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">书名</label>
        <div class="col-sm-5">
       <input type="text" name="name" class="form-control" placeholder="书名"> <font color="red"> *</font><br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">出版社</label>
        <div class="col-sm-5">
       <input type="text" name="publisher" class="form-control" placeholder="出版社"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">年份</label>
        <div class="col-sm-5">
       <input type="text" name="year" class="form-control" placeholder="年份"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">作者</label>
        <div class="col-sm-5">
       <input type="text" name="author" class="form-control" placeholder="作者"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">价格</label>
        <div class="col-sm-5">
       <input type="text" name="price" class="form-control" placeholder="价格"> <font color="red"> *</font>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">数量</label>
        <div class="col-sm-5">
       <input type="number" name="num" class="form-control" placeholder="数量"> <font color="red"> *</font>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <br/>
          <button type="submit" class="btn btn-default">单本入库</button>
        </div>
      </div>
	</form> 
	&nbsp
</div>
</div>
<br />
<!--多书入库-->
<div class="container">
<div class="bs-example" data-example-id="simple-horizontal-form">
	<br />
	<legend>多本入库</legend>
	<form action="mul_insert.php" method="post" enctype="multipart/form-data">
	<label for="bk_data" class=" control-label">格式为:书号,类别,书名,出版社,年份,作者,价格,数量</label>
	<br />
	<br />
	<label for="bk_data" class=" control-label">选择文件:</label>
	<br />
	<br />
	<div class="col-sm-1">
	<input type="file" name="bk_file" id="bk_data" ><br /> 
	</div>
	<br />
	 <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button class="btn btn-default" type="submit" name="submit" >提交图书数据文件</button>
        </div>
      </div>
	</form>
	&nbsp
</div>
</div>
<br />
<!--添加借书证-->
<div class="container">
<div class="bs-example" data-example-id="simple-horizontal-form">
	<form name="input" action="add_card.php" method="post">

	<br />
	<font color="red">* 必填字段</font>
	<br />
	<legend>添加借书证</legend>
      <div class="form-group">
        <label class="col-sm-1 control-label">借书证号</label>
        <div class="col-sm-5">
       <input type="text" name="u_id" class="form-control" placeholder="借书证号"> <font color="red"> *</font><br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">密码</label>
        <div class="col-sm-5">
       <input type="password" name="u_pwd" class="form-control" placeholder="类别"> <font color="red"> *</font><br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">姓名</label>
        <div class="col-sm-5">
       <input type="text" name="u_name" class="form-control" placeholder="姓名"> <font color="red"> *</font><br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">单位</label>
        <div class="col-sm-5">
       <input type="text" name="u_dept" class="form-control" placeholder="单位"> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">类型</label>
        <div class="col-sm-5">
       <input type="text" name="u_type" class="form-control" placeholder="类型"> <br/>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <br/>
          <button type="submit" value ="添加" class="btn btn-default">添加</button>
        </div>
      </div>
	</form> 
	&nbsp
</div>
</div>
<br />
<!--删除借书证-->
<div class="container">
<div class="bs-example" data-example-id="simple-horizontal-form">
	<form name="input" action="del_card.php" method="post">

	<br />
	<legend>删除借书证</legend>
      <div class="form-group">
        <label class="col-sm-1 control-label">借书证号</label>
        <div class="col-sm-5">
       <input type="text" name="u_id" class="form-control" placeholder="借书证号"> <br/>
        </div>
      </div>
      

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <br/>
          <button type="submit" value ="删除" class="btn btn-default">删除</button>
        </div>
      </div>
	</form> 
	&nbsp
</div>
</div>
<br />
 
 <div class="container">
 	<legend>借书证列表</legend>
<div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>借书证号</th>
          <th>姓名</th>
          <th>单位</th>
          <th>类型</th>
        </tr>
      </thead>
     <tbody>
     <?php 
	error_reporting(E_ALL ^ E_DEPRECATED);

	$con=mysql_connect("localhost","root","");
	if (!$con){
		die('Could not connect: '.mysql_error());
	}

	mysql_select_db("library",$con);

	$sql="select * from user";

	$result=mysql_query($sql);
$count=0;
	while($row = mysql_fetch_array($result))
	{$count++;
	echo "<tr> "; 
	echo "<th>"."$count"."</th>";
	echo "<td>" . $row['user_ID'] . "</td>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['department'] . "</td>";
	echo "<td>" . $row['type'] . "</td>";
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
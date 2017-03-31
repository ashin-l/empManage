<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf8" />
<title>管理页面</title>
</head>
<body>
<?php
echo '欢迎 ' . $_GET['name'] . ' 登陆成功';
echo "<br/><a href='login.php'>返回重新登录</a>";
?>
<h1>主界面</h1>
<a href="empList.php">管理用户</a><br/>
<a href="#">添加用户</a><br/>
<a href="#">查询用户</a><br/>
<a href="#">退出系统</a><br/>
</body>
</html>

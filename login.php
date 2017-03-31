<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <title>雇员管理系统</title>
  </head>
  <body>
    <div>
      <h1>管理员登陆系统</h1>
      <form action="loginProcess.php" method="post">
        用户id<input type="text" name="id"><br/>
        密&nbsp;码<input type="password" name="password"><br/>
        <input type="submit" value="登陆">
        <input type="reset" value="重置">
      </form>
      <br/>
      <?php
            if (!empty($_GET['errno'])) {
                echo "<font color='red' size='3'>用户名或密码错误！</font>";
            }
      ?>
    </div>
  </body>
</html>

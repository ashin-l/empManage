<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>雇员信息列表</title>
</head>
<?php

$dbo = new MySQLi('localhost', 'root', '111', 'empmanage');
if ($dbo->connect_error) {
    die($dbo->connect_error);
}
$dbo->query("set names utf8");
$pageSize = 3;
$rowCount = 0;
$pageNow = 1;
if (!empty($_GET['pageNow'])) {
    $pageNow = $_GET['pageNow'];
}
$sql = "select count(id) from emp";
$res1 = $dbo->query($sql);
if ($row = $res1->fetch_row()) {
    $rowCount = $row[0];
}
$res1->free();
$pageCount = ceil($rowCount / $pageSize);
$start = ($pageNow-1) * $pageSize;
$sql = "select * from emp limit $start,$pageSize";
$res2 = $dbo->query($sql);
echo "<table width='700px' border='1px' bordercolor='green' cellspacing=0>";
echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th colspan=2>操作</th></tr>";
while ($row = $res2->fetch_row()) {
    echo "<tr>";
    foreach ($row as $val) {
        echo "<td>". $val . "</td>";
    }
    echo "<td><a href='#'>修改</a></td>";
    echo "<td><a href='#'>删除</a></td></tr>";
}
echo "<h1>雇员信息列表</h1>";
echo "</table>";
for ($i = 1; $i <= $pageCount; ++$i) {
    echo "<a href='empList.php?pageNow=$i'>$i</a>&nbsp;";
}
$res2->free();
$dbo->close();

?>
</html>

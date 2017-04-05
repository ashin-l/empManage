<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>雇员信息列表</title>
</head>
<?php

require_once 'EmpService.class.php';
require_once 'DevidePage.class.php';

$devidePage = new DevidePage();
$devidePage->pageSize = 10;
$devidePage->pageNow = 1;
$pageWhole = 10;
if (!empty($_GET['pageNow'])) {
    $devidePage->pageNow = $_GET['pageNow'];
}
$empService = new EmpService();
$empService->getDevidePage($devidePage);
echo "<table width='700px' border='1px' bordercolor='green' cellspacing=0>";
echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th colspan=2>操作</th></tr>";
foreach ($devidePage->resArray as $row) {
    echo "<tr>";
    foreach ($row as $val) {
        echo "<td>". $val . "</td>";
    }
    echo "<td><a href='#'>修改</a></td>";
    echo "<td><a href='#'>删除</a></td></tr>";
}
//for ($i = 0; $i != count($res); ++$i) {
//    $row = $res[$i];
//    echo "<tr>";
//    foreach ($row as $val) {
//        echo "<td>". $val . "</td>";
//    }
//    echo "<td><a href='#'>修改</a></td>";
//    echo "<td><a href='#'>删除</a></td></tr>";
//}
echo "<h1>雇员信息列表</h1>";
echo "</table>";
if ($devidePage->pageNow > 1) {
    $prePage = $devidePage->pageNow -1;
    echo "<a href='empList.php?pageNow=$prePage'>上一页</a>&nbsp;";
}
$start = floor(($devidePage->pageNow-1)/10) * 10 + 1;
if ($devidePage->pageNow > $pageWhole) {
    $preStart = $start - 1;
    echo "<a href='empList.php?pageNow=$preStart'><<</a>&nbsp;";
}
if (($devidePage->pageCount-$start) < $pageWhole) {
    for (; $start <= $devidePage->pageCount; ++$start) {
        echo "<a href='empList.php?pageNow=$start'>[$start]</a>";
    }
} else {
    for ($i = 0; $i != $pageWhole; ++$i) {
        echo "<a href='empList.php?pageNow=$start'>[$start]</a>";
        ++$start;
    }
    echo "&nbsp;<a href='empList.php?pageNow=$start'>>></a>";
}
if ($devidePage->pageNow < $devidePage->pageCount) {
    $nextPage = $devidePage->pageNow +1;
    echo "&nbsp;<a href='empList.php?pageNow=$nextPage'>下一页</a>&nbsp;";
}
echo "当前页{$devidePage->pageNow}/共{$devidePage->pageCount}页";
echo "<br/><br/>";
echo "<a href='login.php'>返回登陆页</a>";

?>
</html>

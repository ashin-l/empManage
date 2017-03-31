<?php

$id = $_POST['id'];
$password = $_POST['password'];
$dbo = new MySQLi('localhost', 'root', '111', 'empmanage');
if ($dbo->connect_error) {
    die($dbo->connect_error);
}
$dbo->query('set names utf8');
$sql = "select password,name from admin where id=$id limit 0,1";
$res = $dbo->query($sql);
if ($row = $res->fetch_assoc()) {
    if ($row['password'] == md5($password)) {
        $name = $row['name'];
        header("location: empManage.php?name=$name");
        exit();
    }
}
$res->free();
$dbo->close();
header("location: login.php?errno=1");
exit();

?>

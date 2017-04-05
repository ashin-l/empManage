<?php

require_once 'AdminService.class.php';

$id = $_POST['id'];
if (is_numeric($id)) {
    $password = $_POST['password'];
    $adminService = new AdminService();
    if ($name = $adminService->checkAdmin($id, $password)) {
        header("location: empManage.php?name=$name");
        exit();
    }
}
header("location: login.php?errno=1");
exit();

?>

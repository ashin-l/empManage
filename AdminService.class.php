<?php

require_once 'SqlHelper.class.php';

// 该类是业务逻辑处理类，对admin表操作
class AdminService {

    public function checkAdmin($id, $password) {
        $sql = "select password,name from admin where id=$id limit 0,1";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->executeDql($sql);
        if ($row = $res->fetch_assoc()) {
            if ($row['password'] == md5($password)) {
                $name = $row['name'];
                return $name;
            }
        }
        $res->free();
        $sqlHelper->close();
        return "";
    }
}

?>

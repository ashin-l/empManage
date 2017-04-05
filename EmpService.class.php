<?php

require_once 'SqlHelper.class.php';

class EmpService {

    public function getPageCount($pageSize) {
        $pageCount = 0;
        $sqlHelper = new SqlHelper();
        $sql = "select count(id) from emp";
        $res = $sqlHelper->executeDql($sql);
        if ($row = $res->fetch_row()) {
            $pageCount = ceil($row[0] / $pageSize);
        }
        $res->free();
        $sqlHelper->close();
        return $pageCount;
    }

    public function getEmpListByPage($pageNow, $pageSize) {
        $sql = "select * from emp limit " . ($pageNow-1)*$pageSize . ",$pageSize";
        $sqlHelper = new SqlHelper();
        $arr = $sqlHelper->executeDqla($sql);
        $sqlHelper->close();
        return $arr;
    }

    public function getDevidePage($devidePage) {
        $sqlHelper = new SqlHelper();
        $sql1 = "select * from emp limit " . ($devidePage->pageNow-1)*$devidePage->pageSize . ",$devidePage->pageSize";
        $sql2 = "select count(id) from emp";
        $sqlHelper->executeDqldp($sql1, $sql2, $devidePage);
        $sqlHelper->close();
    }

}

?>

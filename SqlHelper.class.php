<?php

class SqlHelper {

    public $dbo;
//    public $dbname;
//    public $username;
//    public $password;
//    public $host;

    public function __construct() {
        $this->dbo = new mysqli('localhost', 'root', '111', 'empmanage');
        //$this->dbo = new mysqli($this->$host, $this->username, $this->password, $this->dbname);
        //$this->mysqli = new MySQLi($this->$host,$this->username, $this->password, $this->dbname);
        if ($this->dbo->connect_error) {
            die($this->dbo->connect_error);
        }
    }
    
    public function executeDml($sql) {
        $b = $this->dbo->query($sql);
        if ($b) {
            if ($this->dbo->affected_rows() > 0) {
                return 1;
            } else {
                return 2;
            }
        } else {
            return 0;
        }
    }

    public function executeDql($sql) {
        $res = $this->dbo->query($sql) or die($this->dbo->error);
        return $res;
    }

    public function executeDqla($sql) {
        $arr = array();
        $res = $this->dbo->query($sql) or die($this->dbo->error);
        $i = 0;
        while ($row = $res->fetch_assoc()) {
            $arr[$i++] = $row;
        }
        $res->free();
        return $arr;
    }

    public function executeDqldp($sql1, $sql2, $devidePage) {
        $res = $this->dbo->query($sql1) or die($this->dbo->error);
        $arr = array();
        while ($row = $res->fetch_assoc()) {
            $arr[] = $row;
        }
        $res->free();
        $devidePage->resArray = $arr;
        $res = $this->dbo->query($sql2) or die($this->dbo->error);
        if ($row = $res->fetch_row()) {
            $devidePage->pageCount = ceil($row[0] / $devidePage->pageSize);
        }
        $res->free();
    }

    public function close() {
        if (!empty($this->dbo)) {
            $this->dbo->close();
        }
    }

}

?>

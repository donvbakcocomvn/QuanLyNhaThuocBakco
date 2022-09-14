<?php

namespace Model;

class DB
{

    public static $TableName;
    public static $Debug;
    private static $Connect;
    // static protected $_Query = "";

    public function __construct()
    {
        if (self::$Connect == null) {
            global $INI;
            $_conn = mysqli_connect($INI['host'], $INI['username'], $INI['password'], $INI['DBname']) or mysqli_errno("Can't connect database");
            mysqli_query($_conn, "SET NAMES utf8"); // Chuyển dữ liệu trả về sang kiểu utf8
            self::$Connect = $_conn;
        }
    }

    protected function GetRows($sql)
    {
        if (self::$Debug)
            echo $sql;

        $res = self::$Connect->query($sql);
        $a = [];
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                $a[] = $row;
            }
        }
        return $a;
    }

    protected function GetRow($sql)
    {
        if (self::$Debug)
            echo $sql;
        $res = self::$Connect->query($sql);
        $a = [];
        if ($res)
            return $res->fetch_assoc();
        return null;
    }

    // đém so dòng
    protected function SelectCount($where)
    {
        $TableName = self::$TableName;
        $sql = "SELECT COUNT(*) as `Total` FROM `{$TableName}` WHERE {$where}";
        $res = $this->GetRow($sql);
        return $res["Total"];
    }

    // Phan Trang
    protected function SelectPT($where, $indexPage, $pageNumber = 10, &$total = 0)
    {
        $indexPage = ($indexPage - 1) * $pageNumber;
        $indexPage = max($indexPage, 0);
        $total = $this->SelectCount($where);
        $where = "{$where} limit {$indexPage},{$pageNumber}";
        return $this->Select($where);
    }

    // lấy 1 dòng
    public function SelectRow($where, $col = [])
    {

        $TableName = self::$TableName;
        $sql = "SELECT * FROM `{$TableName}` WHERE {$where}";
        if ($col) {
            $strCol = implode("`,`", $col);
            $sql = "SELECT `{$strCol}` FROM `{$TableName}` WHERE {$where}";
        }
        return $this->GetRow($sql);
    }

    public function SelectById($Id, $col = [])
    {
        $where = "`Id` = '{$Id}'";
        return $this->SelectRow($where, $col);
    }

    public function GetToSelect($where, $col)
    {
        $TableName = self::$TableName;
        $sql = "SELECT * FROM `{$TableName}` WHERE {$where}";
        if ($col) {
            $strCol = implode("`,`", $col);
            $sql = "SELECT `{$strCol}` FROM `{$TableName}` WHERE {$where}";
        }
        return $this->GetRowsToSelect($sql, $col);
    }

    // lấy nhiều dòng
    public function Select($where, $col = [])
    {
        $TableName = self::$TableName;
        $sql = "SELECT * FROM `{$TableName}` WHERE {$where}";
        if ($col) {
            $strCol = implode("`,`", $col);
            $sql = "SELECT `{$strCol}` FROM `{$TableName}` WHERE {$where}";
        }
        return $this->GetRows($sql);
    }

    public function SelectIdParent($where, $col = [])
    {
        $TableName = self::$TableName;
        $sql = "SELECT DISTINCT `ParentsId` FROM `{$TableName}` WHERE {$where}";
        if ($col) {
            $strCol = implode("`,`", $col);
            $sql = "SELECT `{$strCol}` FROM `{$TableName}` WHERE {$where}";
        }
        return $this->GetRows($sql);
    }

    // sửa

    /**
     * sửa dữ liệu trong databse
     * @param {type} parameter
     */
    public function Update($model, $where)
    {
        $TableName = self::$TableName;
        $strsql = "";
        foreach ($model as $col => $val) {
            if ($val === null)
                $strsql .= "`{$col}`= null,";
            else
                $strsql .= "`{$col}`= '{$val}',";
        }
        $strsql = substr($strsql, 0, -1);
        $sql = "UPDATE `{$TableName}` SET {$strsql} WHERE {$where}";
        $res = self::$Connect->query($sql);
        if (!$res) {
            if (self::$Debug == TRUE)
                echo $sql;
            throw new \Exception(self::$Connect->error);
        }
        return self::$Connect;
    }

    function UpdateRow($model)
    {
        $where = " `Id` = '{$model["Id"]}' ";
        return $this->Update($model, $where);
    }

    // xóa data base

    public function DeleteDB($where)
    {
        $TableName = self::$TableName;
        $sql = "DELETE FROM `{$TableName}` WHERE {$where}";
        if (self::$Debug == TRUE)
            echo $sql;
        self::$Connect->query($sql);
        return self::$Connect;
    }

    public function DeleteById($id)
    {

        $where = " `Id` = '{$id}' ";
        $this->DeleteDB($where);
    }

    //  Them6
    public function Insert($model)
    {
        $col = array_keys($model);
        $val = array_values($model);
        $colstr = implode("`,`", $col);
        $valstr = implode("','", $val);
        $TableName = self::$TableName;

        $sql = "INSERT INTO `{$TableName}`(`{$colstr}`) VALUES ('{$valstr}')";
        if (self::$Debug == TRUE) {
            echo $sql;
        }
        $res = self::$Connect->query($sql);
        if (!$res) {
            throw new \Exception(self::$Connect->error);
        }
        return self::$Connect;
    }

    public function GetRowsToSelect($sql, $col)
    {
        if (self::$Debug) {
            var_dump($col);
            echo $sql;
        }
        $res = self::$Connect->query($sql);
        $a = [];
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                if (isset($row[$col[2]])) {
                    $a[$row[$col[0]]] = $row[$col[1]] . "-" . $row[$col[2]];
                } else {
                    $a[$row[$col[0]]] = $row[$col[1]];
                }
            }
        }
        return $a;
    }

    public function SelectToOptions($where, $columns)
    {
        $a = (array) $this->Select($where, $columns);
        $d = [];
        foreach ($a as $value) {
            if (isset($columns[2])) {
                $d[$value[$columns[0]]] = $value[$columns[1]] . " _ " . $value[$columns[2]];
            } else {
                $d[$value[$columns[0]]] = $value[$columns[1]];
            }
        }
        return $d;
    }
}

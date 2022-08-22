<?php

namespace HangSanXuat\Model;

class NhaCungCap extends \Model\DB implements \Model\iModelBK {

    //`Id`, `Name`, `Images`, `Summary`, `Content`, `STT`,
    public $Id;
    public $Name;
    public $Images;
    public $Summary;
    public $Content;
    public $STT;
    public $isTrash;

    //put your code here
    public function __construct($ncc = null) {
        parent::$TableName = table_prefix . "product_company";
        parent::__construct();
        if ($ncc) {
            if (!is_array($ncc)) {
                $id = $ncc;
                $ncc = $this->GetById($id);
            }
            if ($ncc) {
                $this->Id = isset($ncc["Id"]) ? $ncc["Id"] : "";
                $this->Name = isset($ncc["Name"]) ? $ncc["Name"] : "";
                $this->Images = isset($ncc["Images"]) ? $ncc["Images"] : "";
                $this->Summary = isset($ncc["Summary"]) ? $ncc["Summary"] : "";
                $this->Content = isset($ncc["Content"]) ? $ncc["Content"] : "";
                $this->STT = isset($ncc["STT"]) ? $ncc["STT"] : "";
                $this->isTrash = isset($ncc["isTrash"]) ? $ncc["isTrash"] : "";
            }
        }
    }

    public function Delete($id) {

    }

    public function GetAll() {
        $where = "1=1";
        return $this->Select($where);
    }

    public function GetAllPT($name, $indexPage, $pageNumber, &$total) {
        $keyword = isset($name["keyword"]) ? $name["keyword"] : "";
        $where = "`Name` like '%{$keyword}%'";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetById($id) {
        return $this->SelectById($id);
    }

    public function Post($model) {
        $model["isTrash"] = 0;
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateById($model);
    }

    public static function ToSelect() {

    }

    public function MoveToTrash($id) {
        $model["Id"] = $id;
        $model["isTrash"] = 1;
        return $this->UpdateById($model);
    }

}

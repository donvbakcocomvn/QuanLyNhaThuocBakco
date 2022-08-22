<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\nhanvien\Model;

/**
 * Description of CaLamViec
 *
 * @author MSI
 */
class CaLamViec extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    //put your code here
    public $Id;
    public $Name;
    public $Code;
    public $Des;
    static private $linkbtnSua;
    static private $linkbtnThem;

    public function __construct($id = null) {
        parent::$TableName = prefixTable . "nhanvien_lichlamviec_calamviec";
        parent::__construct();
        if ($id) {
            $this->Id = isset($id["Id"]) ? $id["Id"] : "";
            $this->Name = isset($id["Name"]) ? $id["Name"] : "";
            $this->Code = isset($id["Code"]) ? $id["Code"] : "";
            $this->Des = isset($id["Des"]) ? $id["Des"] : "";
        }
    }

    public function Delete($Id) {

    }

    public function GetById($Id) {

    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $keyword = isset($params["keyword"]) ? $params["keyword"] : "";
        $where = "`Name` like '%{$keyword}%' or `Code` like '%{$keyword}%' ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {

    }

    public function Put($model) {

    }

    public static function ToSelect() {
        $calamViec = new CaLamViec();
        return $calamViec->GetToSelect("1=1", ["Code", "Code", "Name"]);
    }

    function btnPut($content = null, $class = null) {
        return \Model\btnLink::btnPut($this->Id, [\Model\User::Admin, "CaLamViecPut"]);
    }

    static public function btnPost($content = null, $class = null) {
        return \Model\btnLink::btnPost([\Model\User::Admin, "CaLamViecPut"]);
    }

    public function btnDelete() {
        return \Model\btnLink::btnDelete($this->Id, [\Model\User::Admin, "CaLamViecDelete"], "Xóa Ca Làm Việc Này?");
    }

}

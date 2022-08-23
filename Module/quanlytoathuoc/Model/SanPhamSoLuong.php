<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\quanlysanpham\Model;

/**
 * Description of SanPhamSoLuong
 *
 * @author MSI
 */
class SanPhamSoLuong extends \Model\DB implements \Model\IModelService {

    //put your code here
//
    public $Id;
    public $IdSanPham;
    public $Option1;
    public $Option2;
    public $SoLuong;
    public $Gia;

    public function __construct($spsl = null) {

        self::$TableName = prefixTable . "sanpham_options_soluong";
        parent::__construct();
        if ($spsl) {
            if (!is_array($spsl)) {
                $id = $spsl;
                $spsl = $this->GetById($id);
            }
            if ($spsl) {

                $this->Id = isset($spsl["Id"]) ? $spsl["Id"] : null;
                $this->IdSanPham = isset($spsl["IdSanPham"]) ? $spsl["IdSanPham"] : null;
                $this->Option1 = isset($spsl["Option1"]) ? $spsl["Option1"] : null;
                $this->Option2 = isset($spsl["Option2"]) ? $spsl["Option2"] : null;
                $this->SoLuong = isset($spsl["SoLuong"]) ? $spsl["SoLuong"] : null;
                $this->Gia = isset($spsl["Gia"]) ? $spsl["Gia"] : null;
            }
        }
    }

    public function Delete($Id) {
        return $this->DeleteById($Id);
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {
        
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public function GetByIdSanPhan($idSanPham) {
        $where = "`IdSanPham` = '{$idSanPham}'";
        return $this->Select($where);
    }

    public function Option1() {
        return new SanPhamThuocTinhChiTiet($this->Option1);
    }

    public function Option2() {
        return new SanPhamThuocTinhChiTiet($this->Option2);
    }

    public function DeleteByIdSanPham($idSanPham) {
        $where = "`IdSanPham` = '{$idSanPham}'";
        return $this->DeleteDB($where);
    }

}

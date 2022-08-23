<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\quanlysanpham\Model;

/**
 * Description of SanPhamThuocTinhChiTiet
 *
 * @author MSI
 */
class SanPhamThuocTinhChiTiet extends \Model\DB implements \Model\IModelService {

    public $Id;
    public $IdThuocTinh;
    public $Name;

    public function __construct($sp = null) {
        self::$TableName = prefixTable . "sanpham_thuoctinh_chitiet";
        parent::__construct();
        if ($sp) {
            if (!is_array($sp)) {
                $id = $sp;
                $sp = $this->GetById($id);
            }
            if ($sp) {
                $this->Id = isset($sp["Id"]) ? $sp["Id"] : null;
                $this->IdThuocTinh = isset($sp["IdThuocTinh"]) ? $sp["IdThuocTinh"] : null;
                $this->Name = isset($sp["Name"]) ? $sp["Name"] : null;
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
        $where = "1-1";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetAllItems() {
        $where = "1-1";
        return $this->Select($where);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public function GetItemsByType($loaithuocTinh = array()) {
        $loaithuocTinh = implode("','", $loaithuocTinh);
        $where = " `IdThuocTinh` in ('{$loaithuocTinh}') ";
        return $this->Select($where);
    }

    public function GetByIdThuocTinh($loaithuocTinh) {
        $where = " `IdThuocTinh` = '{$loaithuocTinh}' ";
        return $this->Select($where);
    }

    /**
     * xóa theo danh sách thuoc tinh
     * @param {type} parameter
     */
    public function DeleteByIdThuocTinhId($ids) {
        if (is_array($ids)) {
            $strids = implode("','", $ids);
            $strids = "('{$strids}')";
        } else {
            $strids = "('{$ids}')";
        }
        $strids;
        $where = " `IdThuocTinh` in $strids";
        $this->DeleteDB($where);
    }

}

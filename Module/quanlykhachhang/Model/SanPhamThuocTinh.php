<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\quanlysanpham\Model;

/**
 * Description of SanPhamThuocTinh
 *
 * @author MSI
 */
class SanPhamThuocTinh extends \Model\DB implements \Model\IModelService {

    //put your code here
    public $Id;
    public $OptionsTypeId;
    public $IdSanPham;
    public $Options;
    public $GhiChu;

    public function __construct($sp = null) {
        self::$TableName = prefixTable . "sanpham_thuoctinh";
        parent::__construct();
        if ($sp) {
            if (!is_array($sp)) {
                $id = $sp;
                $sp = $this->GetById($id);
            }
            if ($sp) {
                $this->Id = isset($sp["Id"]) ? $sp["Id"] : null;
                $this->OptionsTypeId = isset($sp["OptionsTypeId"]) ? $sp["OptionsTypeId"] : null;
                $this->IdSanPham = isset($sp["IdSanPham"]) ? $sp["IdSanPham"] : null;
                $this->Options = isset($sp["Options"]) ? $sp["Options"] : null;
                $this->GhiChu = isset($sp["GhiChu"]) ? $sp["GhiChu"] : null;
            }
        }
    }

    public function Delete($Id) {

        return $this->DeleteById($Id);
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $where = "1-1";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetItemsByIdSanPham($IdSanPham) {
        $where = "`IdSanPham`='{$IdSanPham}'";
        return $this->Select($where);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public function ToAray() {
        $data["Id"] = $this->Id;
        $data["OptionsTypeId"] = $this->OptionsTypeId;
        $data["IdSanPham"] = $this->IdSanPham;
        $data["GhiChu"] = $this->GhiChu;
        $data["LoaiThuocTinh"] = $this->OptionsTypeId();
        return $data;
    }

    function ThuocTinhChiTiet() {
        $SanPTTCT = new SanPhamThuocTinhChiTiet();
        return $SanPTTCT->GetByIdThuocTinh($this->Id);
    }

    public function OptionsTypeId() {
        $LoaiTT = new SanPhamLoaiThuocTinh();
        return $LoaiTT->GetById($this->OptionsTypeId);
    }

    public function GetBySanPhamOptionsType($idSanPham, $optionsIndex) {
        $where = "`IdSanPham`='{$idSanPham}' and `Options` = '{$optionsIndex}'";
        return $this->SelectRow($where);
    }

    public function GetItemsByIdSanPhamOptionsIndex($idSanPham, $index) {
        $where = "`IdSanPham`='{$idSanPham}' and `Options` = '{$index}'";
        return $this->SelectRow($where);
    }

    /**
     * xóa thuoc tin theo sản phảm
     * @param {type} parameter
     */
    public function DeleteByIdSanPham($IdSanPham) {
//        b1: lấy tat cá thuoc tính theo mã sản phẩm
        $where = "`IdSanPham` = '{$IdSanPham}'";
        $itemTT = $this->Select($where, ["Id"]);
        $ids = array_map(function($item) {
            return $item["Id"];
        }, $itemTT);
//        var_dump($ids);
        $ttct = new SanPhamThuocTinhChiTiet();
        $ttct->DeleteByIdThuocTinhId($ids);
        $sptt = new SanPhamThuocTinh();
        $where = "`IdSanPham` = '{$IdSanPham}'";
        $sptt->DeleteDB($where);
    }

}

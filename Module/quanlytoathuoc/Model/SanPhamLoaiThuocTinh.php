<?php

namespace Module\quanlysanpham\Model;

class SanPhamLoaiThuocTinh extends \Model\DB implements \Model\IModelService {

    public $Id;
    public $OptionsTypeId;
    public $Options;
    public $IdSanPham;
    public $GhiChu;

//`Id`, `OptionsTypeId`, `Options`, `IdSanPham`, `GhiChu`

    public function __construct($sp = null) {
        self::$TableName = prefixTable . "sanpham_options_type";
        parent::__construct();
        if ($sp) {
            if (!is_array($sp)) {
                $id = $sp;
                $sp = $this->GetById($id);
            }
            if ($sp) {
                $this->Id = isset($sp["Id"]) ? $sp["Id"] : null;
                $this->OptionsTypeId = isset($sp["OptionsTypeId"]) ? $sp["OptionsTypeId"] : null;
                $this->Options = isset($sp["Options"]) ? $sp["Options"] : null;
                $this->IdSanPham = isset($sp["IdSanPham"]) ? $sp["IdSanPham"] : null;
                $this->GhiChu = isset($sp["GhiChu"]) ? $sp["GhiChu"] : null;
            }
        }
    }

    public function Delete($Id) {
        
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($name, $indexPage, $pageNumber, &$total) {
        $where = "`Name` like '%$name%' or `Code` like '%$name%' ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

}

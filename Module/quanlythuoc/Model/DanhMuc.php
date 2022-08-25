<?php

namespace Module\quanlythuoc\Model;

class DanhMuc extends \Model\DB implements \Model\IModelService {

    public $Id; 
    public $Code; 
    public $Name;
    public $Link; 
    public $ThanhPhan; 
    public $LuuY; 
    public $GhiChu; 
    public $Lang;
    public $CapCha;

    public function __construct($dm = null) {
        self::$TableName = prefixTable . "qlthuoc_danhmuc";
        parent::__construct();
        if ($dm) {
            if (!is_array($dm)) {
                $id = $dm;
                $dm = $this->GetById($id);
            }
            if ($dm) {
                $this->Id = isset($dm["Id"]) ? $dm["Id"] : null;
                $this->Code = isset($dm["Code"]) ? $dm["Code"] : null;
                $this->Name = isset($dm["Name"]) ? $dm["Name"] : null;
                $this->Link = isset($dm["Link"]) ? $dm["Link"] : null;
                $this->ThanhPhan = isset($dm["ThanhPhan"]) ? $dm["ThanhPhan"] : null;
                $this->LuuY = isset($dm["LuuY"]) ? $dm["LuuY"] : null;
                $this->GhiChu = isset($dm["GhiChu"]) ? $dm["GhiChu"] : null;
                $this->Lang = isset($dm["Lang"]) ? $dm["Lang"] : null;
                $this->CapCha = isset($dm["CapCha"]) ? $dm["CapCha"] : null;
            }
        }
    }

    public function Delete($Id) {
        $tongSanPham = SanPham::CountSPThuocByDanhMuc($Id);

        if ($tongSanPham > 0) {
            throw new \Exception("Không xóa danh mục có sản phẩm.");
        }
        $DM = new danhmuc();
        return $DM->DeleteById($Id);
    }


    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $where = "`Name` like '%{$params["keyword"]}%'";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }


    // Select option theo Name
    public static function CapChaTpOptions($dungTatCa = false) {
        $dm = new danhmuc();
        $where = "`Name` != '' or `Name` is null ";
        $a = $dm->SelectToOptions($where, ["Id", "Name"]);
        if ($dungTatCa == true) {
            $a = ["" => "Tất Cả"] + $a;
        }
        return $a;
    }
}

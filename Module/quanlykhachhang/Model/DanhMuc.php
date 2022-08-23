<?php

namespace Module\quanlysanpham\Model;

class DanhMuc extends \Model\DB implements \Model\IModelService {

    public $Id;
    public $Name;
    public $keyword;
    public $des;
    public $title;
    public $Path;
    public $Link;
    public $Note;
    public $parentsId;
    public $Banner;
    public $IsPublic;
    public $STT;
    public $Lang;

    public function __construct($dm = null) {
        self::$TableName = prefixTable . "sanpham_danhmuc";
        parent::__construct();
        if ($dm) {
            if (!is_array($dm)) {
                $id = $dm;
                $dm = $this->GetById($id);
            }
            if ($dm) {
                $this->Id = isset($dm["Id"]) ? $dm["Id"] : null;
                $this->Name = isset($dm["Name"]) ? $dm["Name"] : null;
                $this->keyword = isset($dm["keyword"]) ? $dm["keyword"] : null;
                $this->des = isset($dm["des"]) ? $dm["des"] : null;
                $this->title = isset($dm["title"]) ? $dm["title"] : null;
                $this->Path = isset($dm["Path"]) ? $dm["Path"] : null;
                $this->Link = isset($dm["Link"]) ? $dm["Link"] : null;
                $this->Note = isset($dm["Note"]) ? $dm["Note"] : null;
                $this->parentsId = isset($dm["parentsId"]) ? $dm["parentsId"] : null;
                $this->Banner = isset($dm["Banner"]) ? $dm["Banner"] : null;
                $this->IsPublic = isset($dm["IsPublic"]) ? $dm["IsPublic"] : null;
                $this->STT = isset($dm["STT"]) ? $dm["STT"] : null;
                $this->Lang = isset($dm["Lang"]) ? $dm["Lang"] : null;
            }
        }
    }

    public function Delete($Id) {
        $tongSanPham = SanPham::CountSanPhamByDanhMuc($Id);

        if ($tongSanPham > 0) {
            throw new \Exception("Không xóa danh mục có sản phẩm.");
        }
        $DM = new DanhMuc();
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

    public static function CapChaTpOptions($dungTatCa = false) {
        $dm = new DanhMuc();
        $where = "`parentsId` != '' or `parentsId` is null ";
        $a = $dm->SelectToOptions($where, ["Id", "Name"]);
        if ($dungTatCa == true) {
            $a = ["" => "Tất Cả"] + $a;
        }
        return $a;
    }

    public function btnSua() {
        
    }

}

<?php

namespace Module\quanlythuoc\Model;
use Model\Common;

class PhieuXuatNhap extends \Model\DB implements \Model\IModelService
{

    public $Id;
    public $IdPhieu;
    public $IdThuoc;
    public $SoLuong;
    public $SoLo;
    public $NhaSanXuat;
    public $NuocSanXuat;
    public $Price;
    public $XuatNhap;
    public $CreateRecord;
    public $UpdateRecord;
    public $NoiDungPhieu;
    public $GhiChu;
    public $NgayNhap;
    public $IsDelete;


    public function __construct($dm = null)
    {
        self::$TableName = prefixTable . "qlthuoc_phieuxuatnhap";
        parent::__construct();
        if ($dm) {
            if (!is_array($dm)) {
                $id = $dm;
                $dm = $this->GetById($id);
            }
            if ($dm) {

                $this->Id = isset($dm["Id"]) ? $dm["Id"] : null;
                $this->IdPhieu = isset($dm["IdPhieu"]) ? $dm["IdPhieu"] : null;
                $this->IdThuoc = isset($dm["IdThuoc"]) ? $dm["IdThuoc"] : null;
                $this->SoLuong = isset($dm["SoLuong"]) ? $dm["SoLuong"] : null;
                $this->SoLo = isset($dm["SoLo"]) ? $dm["SoLo"] : null;
                $this->NhaSanXuat = isset($dm["NhaSanXuat"]) ? $dm["NhaSanXuat"] : null;
                $this->NuocSanXuat = isset($dm["NuocSanXuat"]) ? $dm["NuocSanXuat"] : null;
                $this->Price = isset($dm["Price"]) ? $dm["Price"] : null;
                $this->XuatNhap = isset($dm["XuatNhap"]) ? $dm["XuatNhap"] : null;
                $this->CreateRecord = isset($dm["CreateRecord"]) ? $dm["CreateRecord"] : null;
                $this->UpdateRecord = isset($dm["UpdateRecord"]) ? $dm["UpdateRecord"] : null;
                $this->NoiDungPhieu = isset($dm["NoiDungPhieu"]) ? $dm["NoiDungPhieu"] : null;
                $this->GhiChu = isset($dm["GhiChu"]) ? $dm["GhiChu"] : null;
                $this->NgayNhap = isset($dm["NgayNhap"]) ? $dm["NgayNhap"] : null;
                $this->IsDelete = isset($dm["IsDelete"]) ? $dm["IsDelete"] : null;
            }
        }
    }

    public static function DSThuocPhieuNhap()
    {
        return $_SESSION["DSThuocPhieuNhap"];
    }

    public static function ThemDSThuocPhieuNhap($phieu,$index)
    {
        $_SESSION["DSThuocPhieuNhap"][$index] = $phieu;
    }
    

    public function NgayNhap($id)
    {
        return $this->NgayNhap;
    }

    function CreatIdPhieu($IdPhieu)
    {
        $date = date("Y-m-d");
        $sql = " SELECT COUNT(*) AS `Tong` FROM `lap1_qlthuoc_phieuxuatnhap` WHERE `CreateRecord` LIKE '%{$date}%'";
        $result = $this->GetRow($sql);
        $tong = $result["Tong"] + 1;
        $Id = Common::NumberToStringFomatZero($tong, 3);
        $Id = $IdPhieu . date("dmy{$Id}");
        return $Id;
    }

    // Hàm Xóa Tạm Thời
    function isdelete($DSMaSanPham)
    {
        $model["isDelete"] = 1;
        $DSMaSanPham = implode("','", $DSMaSanPham);
        $where = "`Id` in ('{$DSMaSanPham}') ";
        $this->Update($model, $where);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $danhmucSql = "";

        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }

        $where = " (`IdPhieu` like '%{$name}%' or `IdThuoc` like '%{$name}%' {$danhmucSql}) and `isDelete` = 0 ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }


    public function Delete($Id)
    {
        $tongSanPham = SanPham::CountSPThuocByDanhMuc($Id);

        if ($tongSanPham > 0) {
            throw new \Exception("Không xóa danh mục có sản phẩm.");
        }
        $DM = new danhmuc();
        return $DM->DeleteById($Id);
    }

    public function Post($model)
    {
        return $this->Insert($model);
    }

    public function Put($model)
    {
        return $this->UpdateRow($model);
    }

    public function GetById($Id)
    {
        return $this->SelectById($Id);
    }


    // Select option theo Name
    public static function CapChaTpOptions($dungTatCa = false)
    {
        $dm = new PhieuXuatNhap();
        $where = "`Name` != '' or `Name` is null ";
        $a = $dm->SelectToOptions($where, ["Id", "Name"]);
        if ($dungTatCa == true) {
            $a = ["" => "Tất Cả"] + $a;
        }
        return $a;
    }
}

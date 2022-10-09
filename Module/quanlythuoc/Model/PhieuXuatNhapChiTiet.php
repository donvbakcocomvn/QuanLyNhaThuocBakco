<?php

namespace Module\quanlythuoc\Model;

use Model\Common;


class PhieuXuatNhapChiTiet extends \Model\DB implements \Model\IModelService
{

    public $Id;
    public $IdPhieu;
    public $IdThuoc;
    public $SoLuong;
    public $SoLo;
    public $NhaSanXuat;
    public $NuocSanXuat;
    public $HanSuDung;
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
        self::$TableName = prefixTable . "qlthuoc_phieuxuatnhap_chitiet";
        parent::__construct();

        if ($dm) {
            if (!is_array($dm)) {
                $id = $dm;
                $dm = $this->GetById($id);
            }
            if ($dm) {
                $this->Id = $dm["Id"] ?? null;
                $this->IdPhieu = $dm["IdPhieu"] ?? null;
                $this->IdThuoc = $dm["IdThuoc"] ?? null;
                $this->SoLuong = $dm["SoLuong"] ?? null;
                $this->SoLo = $dm["SoLo"] ?? null;
                $this->NhaSanXuat = $dm["NhaSanXuat"] ?? null;
                $this->HanSuDung = $dm["HanSuDung"] ?? null;
                $this->NuocSanXuat = $dm["NuocSanXuat"] ?? null;
                $this->Price = $dm["Price"] ?? null;
                $this->XuatNhap = $dm["XuatNhap"] ?? null;
                $this->CreateRecord = $dm["CreateRecord"] ?? null;
                $this->UpdateRecord = $dm["UpdateRecord"] ?? null;
                $this->NoiDungPhieu = $dm["NoiDungPhieu"] ?? null;
                $this->GhiChu = $dm["GhiChu"] ?? null;
                $this->NgayNhap = $dm["NgayNhap"] ?? null;
                $this->IsDelete = $dm["IsDelete"] ?? null;
            }
        }
    }

    public function GetXuatNhap($xuatnhap)
    {
        return $xuatnhap == 1 ? "<span class='label-success' style='padding:5px; border-radius: 5px'>Phiếu Nhập</span>" : "<span class='label-danger' style='padding:5px; border-radius: 5px'>Phiếu Xuất</span>";
    }

    public function GetByIdThuoc($IdThuoc)
    {
        $sql = "SELECT * FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE `IdThuoc` = '$IdThuoc'";
        $result = $this->GetRows($sql);
        return $result;
    }
    public function ThanhTien()
    {
        return number_format($this->Price * $this->SoLuong, 0, ".", ",") . " đ";
    }
    public function HanSuDung()
    {
        return date("d-m-Y", strtotime($this->HanSuDung) );
    }
    public function Price()
    {
        return number_format($this->Price, 0, ".", ",") . " đ";
    }
    public function GetByIdPhieu($id)
    {
        $where = "`IdPhieu` = '{$id}'";
        return $this->Select($where);
    }

    public function SanPham()
    {
        return new SanPham($this->IdThuoc);
    }

    public function checkDsThuoc($detailThuoc)
    {
        $sp = new SanPham($detailThuoc);

        $DSThuoc = $_SESSION["DSThuocPhieuNhap"];
        foreach ($DSThuoc as $key => $value) {
            // var_dump($value);
            // var_dump($detailThuoc);
            $value["Id"] = $value["Id"] ?? null;
            if ($value["Id"] == $sp->Id) {
                return null;
            }

            // var_dump($value);
            // var_dump($detailThuoc);
        }
        return true;
    }

    public function CapNhatSanPham($detail, $index)
    {
        // $item = $_SESSION["DetailThuoc"][$index];
        // $sang = $item["Sang"] ?? 0;
        // $chieu = $item["Chieu"] ?? 0;
        // $trua = $item["Trua"] ?? 0;

        $sp = new SanPham($detail);
        $detail["SoLuong"] = $detail["SoLuong"] ?? "";
        $detail["SoLo"] = $detail["SoLo"] ?? "";
        $detail["NhaSanXuat"] = $detail["NhaSanXuat"] ?? "";
        $detail["NuocSanXuat"] = $detail["NuocSanXuat"] ?? "";
        $detail["Price"] = $detail["Price"] ?? "";
        return $_SESSION["DSThuocPhieuNhap"][$index] = $detail;
    }

    public static function DSThuocPhieuNhap()
    {
        $_SESSION["DSThuocPhieuNhap"] = $_SESSION["DSThuocPhieuNhap"] ?? [];

        return $_SESSION["DSThuocPhieuNhap"];
    }

    public static function DeleteAllThuocPhieuNhap()
    {
        return $_SESSION["DSThuocPhieuNhap"] = [];
    }

    public static function DeletePhieuNhap($index)
    {
        $_SESSION["DSThuocPhieuNhap"][$index] = [];
    }

    public static function ThemDSThuocPhieuNhap($phieu, $index)
    {
        $_SESSION["DSThuocPhieuNhap"][$index] = $phieu;
    }


    function CreatIdPhieu($IdPhieu = null)
    {

        return Common::uuid();
    }

    // Hàm Xóa Tạm Thời
    function isdelete($DSMaSanPham)
    {
        $model["isDelete"] = 1;
        $DSMaSanPham = implode("','", $DSMaSanPham);
        $where = "`Id` in ('{$DSMaSanPham}') ";
        $this->Update($model, $where);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total)
    {
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `IsDelete` = 0 ";
        $danhmucSql = "";
        if ($isShow) {
            $isShowSql = "and `IsDelete` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        $where = " (`IdPhieu` like '%{$name}%' {$danhmucSql}) {$isShowSql} ";
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
        // $sp = new SanPham($model["IdThuoc"]);
        // $spItem["Id"] = $sp->Id;
        // $spItem["SoLuong"] =
        //     $sp->Soluong +
        //     ($model["SoLuong"] * $model["XuatNhap"]);
        // return $sp->Put($spItem);
    }

    public function Put($model)
    {
        return $this->UpdateRow($model);
    }

    public function GetById($Id)
    {
        // self::$Debug = false;
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

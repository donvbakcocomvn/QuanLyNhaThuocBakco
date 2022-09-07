<?php

namespace Module\donthuoc\Model;

use Model\Common;
use Model\Locations;
use Model\OptionsService;
use Module\quanlythuoc\Model\DanhMuc;
use Module\quanlythuoc\Controller\sanpham;
use Module\quanlythuoc\Model\SanPham as ModelSanPham;

class DonThuocDetail extends \Model\DB implements \Model\IModelService
{
    public $IdDetail;
    public $IdDonThuoc;
    public $IdThuoc;
    public $SoNgaySDThuoc;
    public $DVT;
    public $SoLuong;
    public $CachDung;
    public $Sang;
    public $Trua;
    public $Chieu;
    public $GiaBan;
    public $GhiChu;

    public function __construct($bn = null)
    {
        self::$TableName = prefixTable . "toathuoc_detail";

        parent::__construct();
        if ($bn) {
            if (!is_array($bn)) {
                $id = $bn;
                $bn = $this->GetById($id);
            }
            if ($bn) {
                $this->IdDetail = isset($bn["IdDetail"]) ? $bn["IdDetail"] : null;
                $this->IdDonThuoc = isset($bn["IdDonThuoc"]) ? $bn["IdDonThuoc"] : null;
                $this->IdThuoc = isset($bn["IdThuoc"]) ? $bn["IdThuoc"] : null;
                $this->SoNgaySDThuoc = isset($bn["SoNgaySDThuoc"]) ? $bn["SoNgaySDThuoc"] : null;
                $this->DVT = isset($bn["DVT"]) ? $bn["DVT"] : null;
                $this->SoLuong = isset($bn["SoLuong"]) ? $bn["SoLuong"] : null;
                $this->CachDung = isset($bn["CachDung"]) ? $bn["CachDung"] : null;
                $this->Sang = isset($bn["Sang"]) ? $bn["Sang"] : null;
                $this->Trua = isset($bn["Trua"]) ? $bn["Trua"] : null;
                $this->Chieu = isset($bn["Chieu"]) ? $bn["Chieu"] : null;
                $this->GiaBan = isset($bn["GiaBan"]) ? $bn["GiaBan"] : null;
                $this->GhiChu = isset($bn["GhiChu"]) ? $bn["GhiChu"] : null;
            }
        }
    }

    public function DeleteDetail($iddonthuoc) {
        $where = " `IdDonThuoc` = '{$iddonthuoc}' ";
        $this->DeleteDB($where);
    }

    public static function XoaSPDetail($idSanPham)
    {
        // bỏ sản phẩm theo mã
        unset($_SESSION["DetailThuoc"][$idSanPham]);
    }

    public static function ClearSession()
    {
        $_SESSION["DetailThuoc"] = [];
        $_SESSION["SoNgaySDThuoc"] = [];
    }

    public static function DsThuoc()
    {
        if (!isset($_SESSION["DetailThuoc"])) {
            for ($i = 0; $i < 10; $i++) {
                $_SESSION["DetailThuoc"][] = [];
            }
        }
        if (count($_SESSION["DetailThuoc"]) == 0) {
            for ($i = 0; $i < 10; $i++) {
                $_SESSION["DetailThuoc"][] = [];
            }
        }
        return $_SESSION["DetailThuoc"];
    }

    public static function setDsThuoc($IdDonThuoc)
    {

        $_SESSION["DetailThuoc"] = [];
        self::DsThuoc();

        $detail = new DonThuocDetail();
        $danhSachThuoc = $detail->getByIdDonThuoc($IdDonThuoc);

        foreach ($danhSachThuoc as $key => $thuoc) {
            $thuocDetail = new ModelSanPham($thuoc["IdThuoc"]);
            $item = $thuocDetail->GetById($thuoc["IdThuoc"]);
            // var_dump($thuoc);
            // $item["SoNgaySDThuoc"] = $thuoc["SoNgaySDThuoc"];
            // $item["SoNgaySDThuoc"] = $thuoc["SoNgaySDThuoc"];
            $item["SoNgaySDThuoc"] = $thuoc["SoNgaySDThuoc"];
            // $item["GhiChu"] = $thuoc["Ghichu"];
            $item["Sang"] = floatval($thuoc["Sang"]);
            $item["Trua"] = floatval($thuoc["Trua"]);
            $item["Chieu"] = floatval($thuoc["Chieu"]);
            $detail->CapNhatThuoc($item, $key);
        }
    }

    public function getByIdDonThuoc($idDonThuoc)
    {
        return $this->Select("`IdDonThuoc` = '{$idDonThuoc}'");
    }

    public function checkDsThuoc($detailThuoc)
    {
        $sp = new ModelSanPham($detailThuoc);

        $DSThuoc = $_SESSION["DetailThuoc"];
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

    public function CapNhatThuoc($detailThuoc, $index)
    {
        $sp = new ModelSanPham($detailThuoc);
        $detailThuoc["Id"] = $detailThuoc["Id"];
        $detailThuoc["IdThuoc"] = $detailThuoc["Id"];
        $detailThuoc["DVT"] = $sp->DVT;
        $detailThuoc["DVTTitle"] = $sp->DonViTinh();
        $detailThuoc["SoNgaySDThuoc"] = $detailThuoc["SoNgaySDThuoc"];
        $detailThuoc["Sang"] = $detailThuoc["Sang"] ?? 0;
        $detailThuoc["Trua"] = $detailThuoc["Trua"] ?? 0;
        $detailThuoc["Chieu"] = $detailThuoc["Chieu"] ?? 0;
        $detailThuoc["Giaban"] = $detailThuoc["Giaban"];
        $detailThuoc["Ghichu"] = $detailThuoc["Ghichu"] ?? "";
        $detailThuoc["CachDung"] = $sp->CachDungThuoc();
        // echo $sp->DVQuyDoi;
        $Sang = max($detailThuoc["Sang"], $sp->DVQuyDoi);
        $Chieu = max($detailThuoc["Chieu"], $sp->DVQuyDoi);
        $Trua = max($detailThuoc["Trua"], $sp->DVQuyDoi);
        $detailThuoc["Soluong"] = ceil(($Sang + $Chieu + $Trua) * $detailThuoc["SoNgaySDThuoc"]);

        return $_SESSION["DetailThuoc"][$index] = $detailThuoc;
    }

    public function GetName()
    {
        echo $sql = "SELECT `Name` FROM `lap1_benhnhan` WHERE 1";
        $result = $this->GetRows($sql);
        return $result;
    }


    // Id Bệnh nhân tự động
    static function CreatIdDetail()
    {
        $detail = new DonThuocDetail();
        $sql = " SELECT COUNT(*) AS `Tong` FROM `lap1_toathuoc_detail` WHERE 1";
        $result = $detail->GetRow($sql);
        $tong = $result["Tong"] + 1;
        $Id = Common::NumberToStringFomatZero($tong, 4);
        // $Id = "BN" . date("ymd{$Id}");
        return $Id;
    }

    // Hàm Xóa tạm thời, không xóa trong DB
    function isdelete($DSMaSanPham)
    {
        $model["isDelete"] = 1;
        $DSMaSanPham = implode("','", $DSMaSanPham);
        $where = "`Id` in ('{$DSMaSanPham}') ";
        $this->Update($model, $where);
    }

    // Lấy Name Opitons Giới Tính
    // public function Gioitinh()
    // {
    //     $op = new OptionsService();
    //     $nameGioiTinh = $op->GetGroupsToSelect("gioitinh");
    //     return $nameGioiTinh[$this->GioiTinh] ?? "Khác";
    // }

    // public function IdLoaiThuoc()
    // {
    //     return new DanhMuc($this->ThuocLoaiDon);
    // }

    public static function ConvertDateToString($arr)
    {
        $krr    = explode('-', $arr);
        $result = implode("", $krr);
        return $result;
    }

    // public static function CapChaTpOptions($dungTatCa = false)
    // {
    //     $dm = new BenhNhan();
    //     $where = "`Name` != '' or `Name` ";
    //     $a = $dm->SelectToOptions($where, ["Id", "Name"]);
    //     if ($dungTatCa == true) {
    //         $a = ["" => "Tất Cả"] + $a;
    //     }
    //     return $a;
    // }

    public function Delete($Id)
    {
        $DM = new DonThuocDetail();
        return $DM->DeleteById($Id);
    }

    public function GetById($Id)
    {
        return $this->SelectById($Id);
    }

    // public function GetItems($params, $indexPage, $pageNumber, &$total) {
    //     $where = "`Name` like '%{$params["keyword"]}%'";
    //     return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    // }

    public function GetItems($params, $indexPage, $pageNumber, &$total)
    {
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

        $where = " `Name` like '%{$name}%' {$danhmucSql} ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model)
    {
        // self::$Debug = true;
        return $this->Insert($model);
    }

    public function Put($model)
    {
        return $this->UpdateRow($model);
    }

    // public static function CapChaTpOptions($dungTatCa = false) {
    //     $dm = new BenhNhan();
    //     $where = "`parentsId` != '' or `parentsId` is null ";
    //     $a = $dm->SelectToOptions($where, ["Id", "Name"]);
    //     if ($dungTatCa == true) {
    //         $a = ["" => "Tất Cả"] + $a;
    //     }
    //     return $a;
    // }

}

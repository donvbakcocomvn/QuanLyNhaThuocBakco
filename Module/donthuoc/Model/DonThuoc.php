<?php

namespace Module\donthuoc\Model;

use Model\Common;
use Model\Locations;
use Model\OptionsService;
use Module\quanlythuoc\Model\DanhMuc;
use Module\benhnhan\Model\BenhNhan;


class DonThuoc extends \Model\DB implements \Model\IModelService
{
    public $Id;
    public $IdBenhNhan;
    public $NameBN;
    public $GioiTinh;
    public $NgaySinh;
    public $ThoiGianKham;
    public $ChanDoanBenh;
    public $ThuocLoaiDon;
    public $TongNgayDung;
    public $Status;



    public function __construct($bn = null)
    {
        self::$TableName = prefixTable . "toathuoc";
        parent::__construct();
        if ($bn) {
            if (!is_array($bn)) {
                $id = $bn;
                $bn = $this->GetById($id);
            }
            if ($bn) {
                $this->Id = isset($bn["Id"]) ? $bn["Id"] : null;
                $this->IdBenhNhan = isset($bn["IdBenhNhan"]) ? $bn["IdBenhNhan"] : null;
                $this->NameBN = isset($bn["NameBN"]) ? $bn["NameBN"] : null;
                $this->GioiTinh = isset($bn["GioiTinh"]) ? $bn["GioiTinh"] : null;
                $this->NgaySinh = isset($bn["NgaySinh"]) ? $bn["NgaySinh"] : null;
                $this->ThoiGianKham = isset($bn["ThoiGianKham"]) ? $bn["ThoiGianKham"] : null;
                $this->ChanDoanBenh = isset($bn["ChanDoanBenh"]) ? $bn["ChanDoanBenh"] : null;
                $this->ThuocLoaiDon = isset($bn["ThuocLoaiDon"]) ? $bn["ThuocLoaiDon"] : null;
                $this->TongNgayDung = isset($bn["TongNgayDung"]) ? $bn["TongNgayDung"] : null;
                $this->Status = isset($bn["Status"]) ? $bn["Status"] : null;
            }
        }
    }

    public function Status()
    {
        $status = [
            1 => "<span class='label-danger' style='padding: 5px;border-radius: 5px';>Chưa lấy thuốc</span>",
            2 => "<span class='label-warning' style='padding: 5px;border-radius: 5px';>Đang soạn thuốc</span>",
            3 => "<span class='label-success' style='padding: 5px;border-radius: 5px';>Đã soạn thuốc xong</span>",
        ];
        return $status[$this->Status] ?? "";
    }

    public function LoaiDonThuoc()
    {
        $status = [
            1 => "<span class='label-info' style='padding: 5px; border-radius: 5px';>Đơn lưu cố định</span>",
            2 => "<span class='label-warning' style='padding: 5px; border-radius: 5px';>Đơn in cho bệnh nhân</span>",
            3 => "<span class='label-success' style='padding: 5px; border-radius: 5px';>Đơn in cho nhà thuốc</span>",
        ];
        return $status[$this->ThuocLoaiDon] ?? "";
    }

    // Lấy 1 dòng by Id
    public static function GetItemById($item, $Id)
    {
        $donthuoc = new DonThuoc();
        $sql = "SELECT `$item` FROM `lap1_benhnhan` WHERE `Id` = '$Id'";
        $result = $donthuoc->GetRow($sql);
        return $result[$item];
    }

    //Lấy Đơn thuốc Detail by Id đơn thuốc
    public static function GetDetailById($IdDonThuoc)
    {
        $donthuoc = new DonThuoc();
        $sql = "SELECT * FROM `lap1_toathuoc_detail` WHERE `IdDonThuoc` = '$IdDonThuoc' Order By `Id`";
        $result = $donthuoc->GetRows($sql);
        return $result;
    }

    // Lấy Id bệnh nhân bằng Id toa thuốc
    public function GetIdBnById($IdTT)
    {
        $sql = "SELECT `IdBenhNhan` FROM `lap1_toathuoc` WHERE `Id` = '$IdTT';";
        $result = $this->GetRow($sql);
        return $result["IdBenhNhan"];
    }

    public function GetNameOptionByValAndGroupId($val, $group)
    {
        $sql = "SELECT `Name` FROM `lap1_options` WHERE `Val` = '$val' and `GroupsId` = '$group'";
        $result = $this->GetRow($sql);
        return $result['Name'];
    }

    public function GetDonThuocByIdBN($idBN)
    {
        $sql = "SELECT * FROM `lap1_toathuoc` WHERE `IdBenhNhan` = '$idBN';";
        $result = $this->GetRows($sql);
        return $result;
    }

    public static function GetNameLoaiDonThuoc($val)
    {
        $dt = new DonThuoc();
        $sql = "SELECT `Name` FROM `lap1_options` WHERE `Val` = $val and `GroupsId` = 'optiondonthuoc'";
        $result = $dt->GetRow($sql);
        return $result["Name"];
    }

    // Lấy Id Danh Mục by Name
    public function GetIdDM($Name)
    {
        $sql = "SELECT `Id` FROM `lap1_qlthuoc_danhmuc` WHERE `Name` = '$Name'";
        $result = $this->GetRow($sql);
        return $result["Id"];
    }

    // Lấy tên bệnh nhân bằng Id
    public function GetNameById($Id)
    {
        $sql = "SELECT `Name` FROM `lap1_benhnhan` WHERE `Id` = '$Id'";
        $result = $this->GetRow($sql);
        return $result["Name"] ?? "";
    }

    function BenhNhan()
    {
        return new BenhNhan($this->IdBenhNhan);
    }

    // Lấy Ngày Sinh bệnh nhân bằng Id
    public function GetNgaySinhById($Id)
    {
        $sql = "SELECT `Ngaysinh` FROM `lap1_benhnhan` WHERE `Id` = '$Id'";
        $result = $this->GetRow($sql);
        return $result["Ngaysinh"];
    }

    // Lấy Giới Tính bệnh nhân bằng Id
    public function GetGioiTinhById($Id)
    {
        $sql = "SELECT `Gioitinh` FROM `lap1_benhnhan` WHERE `Id` = '$Id'";
        $result = $this->GetRow($sql);
        return $result["Gioitinh"];
    }

    // Lấy Name loại đơn bằng Id loại đơn
    public function GetNameLoaiDon($Id)
    {
        $sql = "SELECT `Name` FROM `lap1_qlthuoc_danhmuc` WHERE `Id` = '$Id'";
        $result = $this->GetRow($sql);
        return $result["Name"];
    }


    // Id Bệnh nhân tự động
    function CreatId()
    {
        $date = date("Y-m-d");
        $sql = " SELECT COUNT(*) AS `Tong` FROM `lap1_toathuoc` WHERE `CreateRecord` LIKE '%{$date}%'";
        $result = $this->GetRow($sql);
        $tong = $result["Tong"] + 1;
        $Id = Common::NumberToStringFomatZero($tong, 4);
        $Id = "TT" . date("ymd{$Id}");
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
    public function Gioitinh()
    {
        $op = new OptionsService();
        $nameGioiTinh = $op->GetGroupsToSelect("gioitinh");
        // echo $nameGioiTinh[$this->GioiTinh];
        return $nameGioiTinh[$this->GioiTinh] ?? "Khác";
    }

    public function ThuocLoaiDon()
    {
        $op = new OptionsService();
        $nameGioiTinh = $op->GetGroupsToSelect("optiondonthuoc");
        return $nameGioiTinh[$this->ThuocLoaiDon] ?? "Khác";
    }

    public function IdLoaiThuoc()
    {
        return new DanhMuc($this->ThuocLoaiDon);
    }

    public static function ConvertDateToString($arr)
    {
        $krr    = explode('-', $arr);
        $result = implode("", $krr);
        return $result;
    }

    public function Delete($Id)
    {
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
        $isShow = isset($params["isShow"]) ? $params["isShow"] : '';
        $fromdate = isset($params["fromdate"]) ? $params["fromdate"] : '';
        $todate = isset($params["todate"]) ? $params["todate"] : '';
        $status = isset($params["status"]) ? $params["status"] : '';
        $fromdateSql = "";
        $todateSql = "";
        $statusSql = "";
        if ($status) {
            $statusSql = "and `ThuocLoaiDon` = '{$status}' ";
        }
        if ($fromdate != "") {
            $fromdateSql = "and `CreateRecord` >= '{$fromdate}' ";
        }
        if ($todate != "") {
            $todateSql = "and `CreateRecord` <= '{$todate}' ";
        }
        // self::$Debug = true;
        $where = " (`Id` like '%{$name}%' or `NameBN` like '%{$name}%') {$fromdateSql}{$statusSql}{$todateSql} ORDER BY `CreateRecord` DESC";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetDonChuaXuLy($params, $indexPage, $pageNumber, &$total)
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
        // self::$Debug = true;
        $where = " (`Id` like '%{$name}%' or `IdBenhNhan` like '%{$name}%' or `NameBN` like '%{$name}%' {$danhmucSql}) and `Status`  = 1 ORDER BY `CreateRecord` DESC";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetDonDangXuLy($params, $indexPage, $pageNumber, &$total)
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
        // self::$Debug = true;
        $where = " (`Id` like '%{$name}%' or `IdBenhNhan` like '%{$name}%' or `NameBN` like '%{$name}%' {$danhmucSql}) and `Status` = 2 ORDER BY `Id` DESC";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetDonDaXuLy($params, $indexPage, $pageNumber, &$total)
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
        // self::$Debug = true;
        $where = " (`Id` like '%{$name}%' or `IdBenhNhan` like '%{$name}%' or `NameBN` like '%{$name}%' {$danhmucSql}) and `Status` = 3 ORDER BY `Id` DESC";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetDonCoDinh($params, $indexPage, $pageNumber, &$total)
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
        // self::$Debug = true;
        $where = " (`Id` like '%{$name}%' or `IdBenhNhan` like '%{$name}%' or `NameBN` like '%{$name}%' {$danhmucSql}) and `ThuocLoaiDon` = 1 ORDER BY `Id` DESC";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model)
    {
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

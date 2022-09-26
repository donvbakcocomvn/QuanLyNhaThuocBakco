<?php

namespace Module\benhnhan\Model;

use Model\Common;
use Model\Locations;
use Model\OptionsService;
use TinhThanh;

class BenhNhan extends \Model\DB implements \Model\IModelService
{

    public $Id;
    public $Name;
    public $Gioitinh;
    public $Ngaysinh;
    public $CMND;
    public $Address;
    public $TinhThanh;
    public $QuanHuyen;
    public $PhuongXa;
    public $Phone;
    public $CreateRecord;
    public $UpdateRecord;
    public $isDelete;

    public function __construct($bn = null)
    {
        self::$TableName = prefixTable . "benhnhan";
        parent::__construct();
        if ($bn) {
            if (!is_array($bn)) {
                $id = $bn;
                $bn = $this->GetById($id);
            }
            if ($bn) {
                $this->Id = isset($bn["Id"]) ? $bn["Id"] : null;
                $this->Name = isset($bn["Name"]) ? $bn["Name"] : null;
                $this->Gioitinh = isset($bn["Gioitinh"]) ? $bn["Gioitinh"] : null;
                $this->Ngaysinh = isset($bn["Ngaysinh"]) ? $bn["Ngaysinh"] : null;
                $this->CMND = isset($bn["CMND"]) ? $bn["CMND"] : null;
                $this->Address = isset($bn["Address"]) ? $bn["Address"] : null;
                $this->TinhThanh = isset($bn["TinhThanh"]) ? $bn["TinhThanh"] : null;
                $this->QuanHuyen = isset($bn["QuanHuyen"]) ? $bn["QuanHuyen"] : null;
                $this->PhuongXa = isset($bn["PhuongXa"]) ? $bn["PhuongXa"] : null;
                $this->Phone = isset($bn["Phone"]) ? $bn["Phone"] : null;
                $this->CreateRecord = isset($bn["CreateRecord"]) ? $bn["CreateRecord"] : null;
                $this->UpdateRecord = isset($bn["UpdateRecord"]) ? $bn["UpdateRecord"] : null;
                $this->isDelete = isset($bn["isDelete"]) ? $bn["isDelete"] : null;
            }
        }
    }
    
    function GetDSBenhNhanExport()
    {
        $sql = "SELECT `Id`, `Name`, `Gioitinh`, `Ngaysinh`, `CMND`,`Phone`, `Address`, `TinhThanh`, `QuanHuyen`, `PhuongXa` FROM `lap1_benhnhan`";
        $result = $this->GetRows($sql);
        return $result;
    }

    function GetByNameAndPhone($name, $phone)
    {
        $sql = "SELECT * FROM `lap1_benhnhan` WHERE `Name` LIKE '$name' or `Phone` LIKE '$phone'";
        $result = $this->GetRow($sql);
        return $result;
    }

    public function GetName()
    {
        $sql = "SELECT `Name` FROM `lap1_benhnhan` WHERE 1";
        $result = $this->GetRows($sql);
        return $result;
    }


    // Id Bệnh nhân tự động
    function CreatId()
    {
        $date = date("Y-m-d");
        $sql = " SELECT COUNT(*) AS `Tong` FROM `lap1_benhnhan` WHERE `CreateRecord` LIKE '%{$date}%'";
        $result = $this->GetRow($sql);
        $tong = $result["Tong"] + 1;
        $Id = Common::NumberToStringFomatZero($tong, 4);
        $Id = "BN" . date("ymd{$Id}");
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
        return $nameGioiTinh[$this->Gioitinh] ?? "Khác";
    }

    public static function ConvertDateToString($arr)
    {
        $krr    = explode('-', $arr);
        $result = implode("", $krr);
        return $result;
    }

    public static function CapChaTpOptions($dungTatCa = false)
    {
        $dm = new BenhNhan();
        $where = "`Name` != '' or `Name` ";
        $a = $dm->SelectToOptions($where, ["Id", "Name"]);
        if ($dungTatCa == true) {
            $a = ["" => "Tất Cả"] + $a;
        }
        return $a;
    }

    public function Delete($Id)
    {
        $DM = new BenhNhan();
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
        $fromdate = isset($params["fromdate"]) ? $params["fromdate"] : null;
        $todate = isset($params["todate"]) ? $params["todate"] : null;
        $indate = isset($params["indate"]) ? $params["indate"] : null;
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $indateSql = "";
        $danhmucSql = "";
        if ($indate) {
            $indateSql = " and `CreateRecord` LIKE '%$indate%'";
        }
        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        // self::$Debug = true;
        $where = " (`Name` like '%{$name}%' or `Phone` like '%{$name}%' {$danhmucSql}) {$indateSql} and `isDelete` = 0 ";
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

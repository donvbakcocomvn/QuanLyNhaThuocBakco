<?php

namespace Module\benhnhan\Model;

use Model\Locations;

class BenhNhan extends \Model\DB implements \Model\IModelService {

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

    public function __construct($bn = null) {
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
            }
        }
    }

    function Province()
    {
        return new Locations($this->Province);
    }
    function District()
    {
        return new Locations($this->District);
    }
    function Ward()
    {
        return new Locations($this->Ward);
    }

    public function Delete($Id) {
        $DM = new BenhNhan();
        return $DM->DeleteById($Id);
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    // public function GetItems($params, $indexPage, $pageNumber, &$total) {
    //     $where = "`Name` like '%{$params["keyword"]}%'";
    //     return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    // }

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

        $where = " `Name` like '%{$name}%' {$danhmucSql} ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
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

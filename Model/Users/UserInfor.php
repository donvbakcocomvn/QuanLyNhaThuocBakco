<?php

namespace Model\Users;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserInfor extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    const Phone = "Phone";
    const CongTy = "CongTy";
    const CCCD = "CCCD";
    const GioiTinh = "GioiTinh";
    const MaNhanVien = "MaNhanVien";
    const HinhNhanVien = "HinhNhanVien";
    const HopDong = "HopDong";
    const CMND = "CMND";
    const HoChieu = "HoChieu";
    const NgayVaoLam = "NgayVaoLam";
    const NgayNghiViec = "NgayNghiViec";
    const SoHopDong = "SoHopDong";
    const NgayKyHopDong = "NgayKyHopDong";
    const ThoiHangHopDong = "ThoiHangHopDong";
    const TinhTrangHD = "TinhTrangHD";

    public $Id, $IdUser, $Keyword, $Val, $CreateDate, $UpdateDate, $isDelete;

    function __construct($userInfor = null) {
        self::$TableName = prefixTable . "users_infor";
        parent::__construct();
        if ($userInfor) {
            if (!is_array($userInfor)) {
                $Id = $userInfor;
                $userInfor = $this->GetById($Id);
            }
            $this->Id = isset($userInfor["Id"]) ? $userInfor["Id"] : null;
            $this->IdUser = isset($userInfor["IdUser"]) ? $userInfor["IdUser"] : null;
            $this->Keyword = isset($userInfor["Keyword"]) ? $userInfor["Keyword"] : null;
            $this->Val = isset($userInfor["Val"]) ? $userInfor["Val"] : null;
            $this->CreateDate = isset($userInfor["CreateDate"]) ? $userInfor["CreateDate"] : null;
            $this->UpdateDate = isset($userInfor["UpdateDate"]) ? $userInfor["UpdateDate"] : null;
            $this->isDelete = isset($userInfor["isDelete"]) ? $userInfor["isDelete"] : null;
        }
    }

    public function Delete($Id) {
        return $this->DeleteById($Id);
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function getUserIdByVal($name) {

        $where = " `Val` like '%$name%' GROUP BY `IdUser`";
        return $this->Select($where, ["IdUser"]);
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {

    }

    public function Post($model) {
        if (!isset($model["Id"])) {
            $model["Id"] = \Model\Common::uuid();
        }
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public static function ToSelect() {

    }

    public function GetItemByUserKey($IdUser, $Keyword) {
        $where = "`IdUser` = '{$IdUser}' and `Keyword` = '{$Keyword}'";
        return $this->SelectRow($where);
    }

    public static function GetByUserKey($Code, $IdUser = null) {
        $userInfor = new UserInfor();
        if ($IdUser == null) {
            $IdUser = \Model\User::CurentUser()->Id;
        }
        return $userInfor->GetItemByUserKey($IdUser, $Code);
    }

    public function GetUserIdByKeywordVal($params) {
        // (`Keyword` ='Phone' AND `Val` like '%7%') or (`Keyword` ='CMND' AND `Val` like '%7%') or (`Keyword` ='CCCD' AND `Val` like '%7%') or (`Keyword` ='GioiTinh' AND `Val` = '1')
        $phone = isset($params[UserInfor::Phone]) ? \Model\Common::TextInput($params[UserInfor::Phone]) : "";
        $phoneSQL = "";
        if ($phone) {
            $phoneSQL = "and (`Keyword` ='Phone' AND `Val` like '%{$phone}%') ";
        }
        $CMND = isset($params[UserInfor::CMND]) ? \Model\Common::TextInput($params[UserInfor::CMND]) : "";
        $CMNDSQL = "";
        if ($CMND) {
            $CMNDSQL = "and (`Keyword` ='CMND' AND `Val` like '%{$CMND}%') ";
        }
        $CongTy = isset($params[UserInfor::CongTy]) ? \Model\Common::TextInput($params[UserInfor::CongTy]) : "";
        $CongTySql = "";
        if ($CongTy) {
            $CongTySql = "and (`Keyword` ='CongTy' AND `Val` = '{$CongTy}') ";
        }
        $CCCD = isset($params[UserInfor::CCCD]) ? $params[UserInfor::CCCD] : "";
        $CCCDSql = "";
        if ($CCCD) {
            $CCCDSql = "and (`Keyword` ='CCCD' AND `Val` like '%{$CCCD}%')";
        }
        $where = " 1=1 {$CMNDSQL} {$CongTySql} {$CCCDSql} {$phoneSQL}   GROUP By `IdUser`";
        return $this->Select($where, ["IdUser"]);
    }

}

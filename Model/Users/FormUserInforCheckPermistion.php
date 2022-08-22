<?php

namespace Model\Users;

class FormUserInforCheckPermistion implements IFormUserInfor {

    public static function CCCD($val = null) {
        return true;
    }

    public static function CMND($val = null) {
        return true;
    }

    public static function CongTy($val = null) {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "QuanLyNhanSu"]) == true) {
            return true;
        }
        return FALSE;
    }

    public static function GioiTinh($val = null) {
        return true;
    }

    public static function HoChieu($val = null) {

        return true;
    }

    public static function HopDong($val = null) {

        return true;
    }

    public static function NgayKyHopDong($val = null) {

        return true;
    }

    public static function NgayNghiViec($val = null) {
        return \Model\Permission::CheckPremision([\Model\User::Admin, "QuanLyNhanSu"]);
    }

    public static function NgayVaoLam($val = null) {
        return \Model\Permission::CheckPremision([\Model\User::Admin, "QuanLyNhanSu"]);
    }

    public static function Phone($val = null) {
        return FALSE;
    }

    public static function SoHopDong($val = null) {

        return \Model\Permission::CheckPremision([\Model\User::Admin, "QuanLyNhanSu"]);
    }

    public static function ThoiHangHopDong($val = null) {

        return \Model\Permission::CheckPremision([\Model\User::Admin, "QuanLyNhanSu"]);
    }

    public static function TinhTrangHD($val = null) {
        return \Model\Permission::CheckPremision([\Model\User::Admin, "QuanLyNhanSu"]);
    }

}

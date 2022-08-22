<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model\Users;

/**
 *
 * @author MSI
 */
interface IFormUserInfor {

    //put your code here

    static public function Phone($val = null);

    static public function CongTy($val = null);

    static public function HopDong($val = null);

    static public function GioiTinh($val = null);

    static public function CCCD($val = null);

    static public function CMND($val = null);

    static public function HoChieu($val = null);

    static public function NgayVaoLam($val = null);

    static public function NgayNghiViec($val = null);

    static public function SoHopDong($val = null);

    static public function NgayKyHopDong($val = null);

    static public function ThoiHangHopDong($val = null);

    static public function TinhTrangHD($val = null);

    static public function HinhNhanVien($val = null);

    static public function MaNhanVien($val = null);
}

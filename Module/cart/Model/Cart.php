<?php

namespace Module\cart\Model;

class Cart {

    const giohang = "giohang";

    public function __construct() {
        
    }

    /**
     * thêm sản phẩm vào giỏ hàng
     * @param {type} parameter
     */
    static function ThemSanPhamVaoGioHang($sanPham) {
        // nếu có tăng sl
        if (isset($_SESSION[self::giohang][$sanPham["Id"]])) {
            $_SESSION[self::giohang][$sanPham["Id"]]["Number"] += $sanPham["Number"];
        } else {
            // chưa có
            $_SESSION[self::giohang][$sanPham["Id"]] = $sanPham;
        }
    }

    public static function LinkThemSanPham($param0) {
        return "/cart/index/addtocart/?id=" . $param0;
    }

    public static function DSSanPham() {
        if ($_SESSION[self::giohang])
            return $_SESSION[self::giohang];
        return [];
    }

    public static function TongTien() {
        $dsSP = self::DSSanPham();
        if ($dsSP == null)
            return 0;
        $tong = 0;
        foreach ($dsSP as $sp) {
            $_item = new \Module\quanlysanpham\Model\SanPham($sp);
            $thanhTien = $_item->ThanhTien();

            $tong += $thanhTien;
        }
        return $tong;
    }

    public static function TongTienToVnd() {
        $tong = self::TongTien();
        return number_format($tong, 0, ".", ",") . " vnđ";
    }

    public static function LinkThemSLSanPham($param0, $param1) {
        return "/cart/index/addtocart/?id={$param0}&sl={$param1}";
    }

    public static function XoaSanPham($id) {
        unset($_SESSION[self::giohang][$id]);
    }

    public static function TruSanPhamVaoGioHang($id, $sl) {
        if (isset($_SESSION[self::giohang][$id])) {
            $_SESSION[self::giohang][$id]["Number"] = $_SESSION[self::giohang][$id]["Number"] - $sl;
            // xóa sản phẩm khoi gio hàng
            if ($_SESSION[self::giohang][$id]["Number"] == 0) {
                self::XoaSanPham($id);
            }
            //$_SESSION[self::giohang][$id]["Number"] = min(1,$_SESSION[self::giohang][$id]["Number"]);
        }
    }

    public static function LinkTruSLSanPham($param0, $param1) {
        return "/cart/index/truslsanpham/?id={$param0}&sl={$param1}";
    }

    public static function LinkXoaSanPham($param0) {
        //xoasanpham
        return "/cart/index/xoasanpham/?id={$param0}";
    }

    public static function XoaGioHang() {
        $_SESSION[self::giohang] = [];
    }

    public static function LinkXoaGioHang() {
        return "/cart/index/xoagiohang/";
    }

    public static function CapNhatSL($id, $sl) {
        if (isset($_SESSION[self::giohang][$id])) {
            $_SESSION[self::giohang][$id]["Number"] = $sl;
            if ($_SESSION[self::giohang][$id]["Number"] <= 0) {
                self::XoaSanPham($id);
            }
        }
    }

    public static function LinkDatHang() {
        return "/cart/index/dathang/";
    }

    public static function TaoMaDonHang() {
        $ngay = date("d", time());
        $thang = date("m", time());
        $nam = date("Y", time());
        $count = DonHang::ToSoDonHang()+1;
        return "DH-{$nam}-{$thang}-{$count}";    
    }

}

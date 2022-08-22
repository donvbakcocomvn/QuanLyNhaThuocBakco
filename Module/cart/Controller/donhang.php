<?php

namespace Module\cart\Controller;

class donhang extends \Application {

    public function __construct() {
        new \Controller\backend();
 
    }

    public function dathang() {

        if (\Model\Request::Post("DonHang", [])) {
            $postDonHang = \Model\Request::Post("DonHang", []);
            $postDonHang["HoTen"] = \Model\Common::TextInputNoHtml($postDonHang["HoTen"]);
            $postDonHang["Code"] = \Module\cart\Model\Cart::TaoMaDonHang();
            $postDonHang["Id"] = \Model\Common::uuid();
            $postDonHang["SDT"] = \Model\Common::TextInputNoHtml($postDonHang["SDT"]);
            $postDonHang["TinhThanh"] = \Model\Common::IntInput($postDonHang["TinhThanh"]);
            $postDonHang["QuanHuyen"] = \Model\Common::IntInput($postDonHang["QuanHuyen"]);
            $postDonHang["DiaChiChiTiet"] = \Model\Common::TextInputNoHtml($postDonHang["DiaChiChiTiet"]);
            if ($postDonHang["NgayGiaoHang"] == "") {

                $postDonHang["NgayGiaoHang"] = \Model\Common::DateInput(null, null, 2 * 24 * 3600);
            } else {
                $postDonHang["NgayGiaoHang"] = \Model\Common::DateInput($postDonHang["NgayGiaoHang"], null, 24 * 3600, $minDate = null);
            }
            $postDonHang["NgayTao"] = \Model\Common::DateInput();
            $postDonHang["GhiChu"] = \Model\Common::TextInputNoHtml($postDonHang["GhiChu"]);
            $postDonHang["TongTien"] = \Module\cart\Model\Cart::TongTien();
            $postDonHang["SoSP"] = count(\Module\cart\Model\Cart::DSSanPham());
            $donHang = new \Module\cart\Model\DonHang();
            $donHang->Post($postDonHang);
            $donHangChiTiet = new \Module\cart\Model\DonHangChiTiet();

            $DSSanPham = \Module\cart\Model\Cart::DSSanPham();
            foreach ($DSSanPham as $key => $value) {
                $donhangct["IdDonHang"] = $postDonHang["Id"];
                $donhangct["IdSanPham"] = $value["Id"];
                $donhangct["SoLuong"] = $value["Number"];
                $donhangct["Gia"] = $value["Price"];
                $donHangChiTiet->Post($donhangct);
            }

            // gửi mail cho người quản lý don hàng
            \Module\cart\Model\Cart::XoaGioHang();
        }

        $this->View();
    }

    public function index() {
        $this->View();
    }

    public function xoagiohang() {
        // thêm sản phẩm nào vào giỏ hàng
        $id = \Model\Request::Get("id", null);
        \Module\cart\Model\Cart::XoaGioHang();
        \Model\Common::ToUrl("/cart/index/index");
    }

    public function capnhatsl() {
        // thêm sản phẩm nào vào giỏ hàng
        $id = \Model\Request::Get("id", null);
        $sl = \Model\Request::Get("sl", 1);
        $sl = intval($sl);
        \Module\cart\Model\Cart::CapNhatSL($id, $sl);
        \Model\Common::ToUrl("/cart/index/index");
    }

    public function xoasanpham() {
        // thêm sản phẩm nào vào giỏ hàng
        $id = \Model\Request::Get("id", null);
        \Module\cart\Model\Cart::XoaSanPham($id);
        \Model\Common::ToUrl("/cart/index/index");
    }

    public function truslsanpham() {
        // thêm sản phẩm nào vào giỏ hàng
        $id = \Model\Request::Get("id", null);
        $sl = \Model\Request::Get("sl", null);
        if ($sl != null)
            $sl = intval($sl);
        $sl = min(1, $sl);
        \Module\cart\Model\Cart::TruSanPhamVaoGioHang($id, $sl);
        \Model\Common::ToUrl("/cart/index/index");
    }

    public function addtocart() {
        // thêm sản phẩm nào vào giỏ hàng
        $id = \Model\Request::Get("id", null);
        $sl = \Model\Request::Get("sl", null);
        $sp = new \Module\quanlysanpham\Model\SanPham();
        $item = $sp->GetById($id);
        // số lượng sản phẩm
        $item["Number"] = 1;
        if ($sl != null)
            $item["Number"] = intval($sl);

        \Module\cart\Model\Cart::ThemSanPhamVaoGioHang($item);
        \Model\Common::ToUrl("/cart/index/index");
    }

}

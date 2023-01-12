<?php

namespace Controller;

use Model\ThongKe;
use PFBC\View;
use Module\quanlythuoc\Model\SanPham;
use Model\Common;

class backend extends \Application
{

    /**
     * kiểm tra dăng nhap
     * @param {type} parameter
     */
    public function __construct()
    {

        $_SESSION[QuanLy] = isset($_SESSION[QuanLy]) ? $_SESSION[QuanLy] : null;
        /**
         * chưa đăng nhap
         * @param {type} parameter
         */
        //        var_dump($_SESSION[QuanLy]);
        if ($_SESSION[QuanLy] == null) {
            /**
             * chuyển qua trang dăng nhap
             * @param {type} parameter
             */
            \Model\Common::ToUrl(LoginPage);
            //
        }
        self::$_Theme = "backend";
        /**
         * đang nhap thanh cong
         * @param {type} parameter
         */
    }

    function index()
    {
        // \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy]);
        $this->View();
    }

    function exportdsnhapchitiet()
    {
        $thongke = new ThongKe();
        $sp = new SanPham();
        $item = $thongke->GetDSXuatNhapExportChiTiet(1);
        // var_dump($item);
        $data[] = [
            "Mã phiếu", "Mã thuốc", "Số lô", "Nhà sản xuất", "Số lượng", "Nước sản xuất", "Giá nhập", "Tổng giá nhập"
        ];
        if ($item) {
            foreach ($item as $row) {
                $row["IdThuoc"] = $sp->GetNameById($row["IdThuoc"]);
                $row["SoLuong"] = Common::ViewNumber($row["SoLuong"]);
                $row["Price"] = Common::ViewPrice($row["Price"]);
                $row["Tong"] = Common::ViewPrice($row["Tong"]);
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportDSNhapChiTiet.xlsx");
        }
    }

    function exportdsxuatchitiet()
    {
        $thongke = new ThongKe();
        $sp = new SanPham();
        $item = $thongke->GetDSXuatNhapExportChiTiet(-1);
        // var_dump($item);
        $data[] = [
            "Mã phiếu", "Mã thuốc", "Số lô", "Nhà sản xuất", "Số lượng", "Nước sản xuất", "Giá nhập", "Tổng giá nhập"
        ];
        if ($item) {
            foreach ($item as $row) {
                $row["IdThuoc"] = $sp->GetNameById($row["IdThuoc"]);
                $row["SoLuong"] = Common::ViewNumber($row["SoLuong"]);
                $row["Price"] = Common::ViewPrice($row["Price"]);
                $row["Tong"] = Common::ViewPrice($row["Tong"]);
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportDSXuatChiTiet.xlsx");
        }
    }

    function xuatkho()
    {
        $modelItem = new ThongKe();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->PhieuXuatKho($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function tonkho()
    {
        $modelItem = new ThongKe();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->ThuocTonKho($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function dstong()
    {
        $modelItem = new ThongKe();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->DSThuocTongKho($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function nhapkho()
    {
        $modelItem = new ThongKe();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->PhieuNhapKho($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function dsnhapchitiet()
    {
        $modelItem = new ThongKe();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->DanhSachNhapChiTiet($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function dsxuatchitiet()
    {
        $modelItem = new ThongKe();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->DanhSachXuatChiTiet($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function lichsunhap()
    {
        $idThuoc = $this->getParams(0);
        // echo $idThuoc;
        $this->View($id = ['id']);
    }

    function lichsuxuat()
    {
        $idThuoc = $this->getParams(0);
        // echo $idThuoc;
        $this->View($id = ['id']);
    }

    function qrcode()
    {

        $this->View();
    }

    function logout()
    {

        $_SESSION[QuanLy] = null;
        unset($_COOKIE['Token']);
        setcookie("Token", null, -1, "/");
        \Model\Common::ToUrl(LoginPage);
    }
}

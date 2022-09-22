<?php

namespace Controller;

use Model\ThongKe as ModelThongKe;
use Model\Common;
use Model\Notions;
use Module\benhnhan\Model\BenhNhan;
use Module\quanlythuoc\Model\SanPham;
use Module\quanlythuoc\Permission;

class thongke extends \Application
{


    public function __construct()
    {
        new backend();
        self::$_Theme = "backend";
        // \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_view")]);
        //336bdbdba15a2836969cb534cc56f9df
    }

    function index()
    {
        $this->View();
    }

    function thuocsaphet()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_DS]);
        $modelItem = new \Model\ThongKe();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->GetThuocSapHet($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function benhnhantrongngay()
    {
        $modelItem = new \Model\ThongKe();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
        $params["indate"] = isset($_REQUEST["indate"]) ? date('Y-m-d', strtotime($_REQUEST["indate"])) : date('Y-m-d', time());
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->GetBenhNhanTrongNgay($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function donthuoctrongngay()
    {
        $modelItem = new \Model\ThongKe();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
        $params["indate"] = isset($_REQUEST["indate"]) ? date('Y-m-d', strtotime($_REQUEST["indate"])) : date('Y-m-d', time());
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->GetDonThuocTrongNgay($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function ExportLichSuNhap()
    {
        $thongke = new \Model\ThongKe();
        $sp = new SanPham();
        $item = $thongke->LichSuNhapXuatChiTiet(1);
        var_dump($item);
        $data[] = [
            "Ngày nhập", "Tên thuốc", "Số lô", "Nhà sản xuất", "Số lượng", "Nước sản xuất","Giá nhập","Tổng giá nhập" 
        ];
        if ($item) {
            foreach ($item as $row) {
                $row["NgayNhap"] = Common::ForMatDMYHIS($row["NgayNhap"]);
                $row["IdThuoc"] = $sp->GetNameById($row["IdThuoc"]);
                $row["SoLuong"] = Common::ViewNumber($row["SoLuong"]);
                $row["Price"] = Common::ViewPrice($row["Price"]);
                $row["Tong"] = Common::ViewPrice($row["Tong"]);
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportLichSuNhap.xlsx");
        }
    }

    function ExportLichSuXuat()
    {
        $thongke = new \Model\ThongKe();
        $sp = new SanPham();
        $item = $thongke->LichSuNhapXuatChiTiet(-1);
        var_dump($item);
        $data[] = [
            "Ngày nhập", "Tên thuốc", "Số lô", "Nhà sản xuất", "Số lượng", "Nước sản xuất","Giá nhập","Tổng giá nhập" 
        ];
        if ($item) {
            foreach ($item as $row) {
                $row["NgayNhap"] = Common::ForMatDMYHIS($row["NgayNhap"]);
                $row["IdThuoc"] = $sp->GetNameById($row["IdThuoc"]);
                $row["SoLuong"] = Common::ViewNumber($row["SoLuong"]);
                $row["Price"] = Common::ViewPrice($row["Price"]);
                $row["Tong"] = Common::ViewPrice($row["Tong"]);
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportLichSuXuat.xlsx");
        }
    }

    function exportthuocsaphet()
    {
        $thongke = new \Model\ThongKe();
        $sp = new SanPham();
        $item = $thongke->GetSpCanhBao();
        // var_dump($item);
        // $data[] = ["BẢNG KÊ THUỐC PHÒNG KHÁM PHƯƠNG UYÊN"];
        $data[] = [
            "Mã thuốc", "Tên Thuốc", "Tên biệt dược", "Số lô", "Giá nhập", "Giá Bán", "Đơn vị tính", "Ngày sản xuất", "Hạn sử dụng", "Tác dụng", "Cơ chế tác dụng", "Ghi chú", "Số lượng", "Nhà sản xuất", "Nước sản xuất", "Cách dùng thuốc", "Số lượng cảnh báo"
        ];
        if ($item) {
            foreach ($item as $row) {
                $row["Giaban"] = Common::ViewPrice($row["Giaban"]);
                $row["Gianhap"] = Common::ViewPrice($row["Gianhap"]);
                $row["Ngaysx"] = Common::ForMatDMY($row["Ngaysx"]);
                $row["HSD"] = Common::ForMatDMY($row["HSD"]);
                $row["CachDung"] = $sp->GetDesByVal($row["CachDung"], 'cachdungthuoc');
                $row["DVT"] = $sp->GetDesByVal($row["DVT"], 'donvitinh');
                $row["NuocSX"] = Notions::GetById($row["NuocSX"]);
                // $row["DVT"] = $sp->DonViTinh($row["DVT"]);
                // var_dump($row["DVT"]);
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportThuocSapHet.xlsx");
        }
    }

    function ExportDSPhieuXuat()
    {
        $thongke = new \Model\ThongKe();
        $sp = new SanPham();
        $item = $thongke->GetDSPhieuXuatNhapExport(-1);
        // var_dump($item);
        // $data[] = ["BẢNG KÊ THUỐC PHÒNG KHÁM PHƯƠNG UYÊN"];
        $data[] = [
            "Mã phiếu", "Đơn vị cung cấp", "Nội dung phiếu", "Ngày xuất", "Tổng tiền xuất", "Ghi chú"
        ];
        if ($item) {
            foreach ($item as $row) {
                $row["NgayNhap"] = Common::ForMatDMYHIS($row["NgayNhap"]);
                $row["TongTien"] = Common::ViewPrice($row["TongTien"]);
                // var_dump($row);
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportDSPhieuXuat.xlsx");
        }
    }

    

    function ExportDSPhieuNhap()
    {
        $thongke = new \Model\ThongKe();
        $sp = new SanPham();
        $item = $thongke->GetDSPhieuXuatNhapExport(1);
        // var_dump($item);
        // $data[] = ["BẢNG KÊ THUỐC PHÒNG KHÁM PHƯƠNG UYÊN"];
        $data[] = [
            "Mã phiếu", "Đơn vị cung cấp", "Nội dung phiếu", "Ngày nhập", "Tổng tiền nhập", "Ghi chú"
        ];
        if ($item) {
            foreach ($item as $row) {
                $row["NgayNhap"] = Common::ForMatDMYHIS($row["NgayNhap"]);
                $row["TongTien"] = Common::ViewPrice($row["TongTien"]);
                // var_dump($row);
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportDSPhieuNhap.xlsx");
        }
    }

    function thuocbang1000()
    {
        $this->View();
    }
}

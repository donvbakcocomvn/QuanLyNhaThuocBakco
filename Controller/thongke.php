<?php

namespace Controller;

use Model\ThongKe as ModelThongKe;
use Model\Common;
use Model\Notions;
use Module\benhnhan\Model\BenhNhan;
use Module\donthuoc\Model\DonThuoc;
use Module\quanlythuoc\Model\DanhMuc;
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
        $params["nameBN"] = isset($_REQUEST["nameBN"]) ? \Model\Common::TextInput($_REQUEST["nameBN"]) : "";
        $params["address"] = isset($_REQUEST["address"]) ? \Model\Common::TextInput($_REQUEST["address"]) : "";
        $params["phone"] = isset($_REQUEST["phone"]) ? \Model\Common::TextInput($_REQUEST["phone"]) : "";
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
        $params["id"] = isset($_REQUEST["id"]) ? \Model\Common::TextInput($_REQUEST["id"]) : "";
        $params["status"] = isset($_REQUEST["status"]) ? \Model\Common::TextInput($_REQUEST["status"]) : "";
        $params["nameBN"] = isset($_REQUEST["nameBN"]) ? \Model\Common::TextInput($_REQUEST["nameBN"]) : "";
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

    function thuocsaphethan()
    {
        $modelItem = new \Model\ThongKe();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->GetDSThuocSapHetHan($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
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

    function exportbenhnhantrongngay()
    {
        $thongke = new \Model\ThongKe();
        $item = $thongke->GetDSBNTrongNgay();
        // var_dump($item);
        // $data[] = ["BẢNG KÊ THUỐC PHÒNG KHÁM PHƯƠNG UYÊN"];
        $data[] = [
            "Mã bệnh nhân", "Tên bệnh nhân", "Giới tính", "Ngày sinh", "CMND/CCCD", "Địa chỉ", "Số điện thoại", "Tỉnh/Thành phố", "Quận/huyện", "Phường/Xã"
        ];
        if ($item) {
            foreach ($item as $row) {
                $benhnhan = new BenhNhan($row["Id"]);
                // var_dump($benhnhan);
                $row["Gioitinh"] = $benhnhan->Gioitinh();
                $row["Ngaysinh"] = Common::ForMatDMY($row["Ngaysinh"]);
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportBenhNhanTrongNgay.xlsx");
        }
    }
    function exportDSthuocton()
    {
        $thongke = new \Model\ThongKe();
        $item = $thongke->GetDSThuocTonExport();
        // var_dump($item);
        $data[] = [
            "Mã thuốc", "Thuộc loại đơn", "Tên thuốc", "Số lượng tồn kho"
        ];
        if ($item) {
            foreach ($item as $row) {
                $dm = new DanhMuc($row["Idloaithuoc"]);
                $row["Idloaithuoc"] = $dm->Name;
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportDSThuocTon.xlsx");
        }
    }

    function exportDStongthuoc()
    {
        $thongke = new \Model\ThongKe();
        $item = $thongke->GetDSTongThuocTrongKhoExport();
        // var_dump($item);
        $data[] = [
            "Mã thuốc", "Danh mục thuốc", "Tên thuốc", "Số lượng tổng"
        ];
        if ($item) {
            foreach ($item as $row) {
                $thuoc = new SanPham($row['Id']);
                $dm = new DanhMuc($row["Idloaithuoc"]);
                $row["Idloaithuoc"] = $dm->Name;
                $row["TongThuoc"] = $row["TongThuoc"].' '.$thuoc->DonViTinh();
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportDSTongThuoc.xlsx");
        }
    }

    function exportdonthuoctrongngay()
    {
        $thongke = new \Model\ThongKe();
        $item = $thongke->GetDSDonThuocTrongNgay();
        // var_dump($item);
        $data[] = [
            "Mã đơn thuốc", "Mã bệnh nhân", "Tên bệnh nhân", "Giới tính", "Ngày sinh", "Thời gian khám", "Chẩn đoán bệnh", "Thuộc loại đơn", "Số ngày dùng thuốc"
        ];
        if ($item) {
            foreach ($item as $row) {
                $benhnhan = new BenhNhan($row["IdBenhNhan"]);
                $donthuoc = new DonThuoc($row["Id"]);
                $row["GioiTinh"] = $benhnhan->Gioitinh();
                $row["NgaySinh"] = Common::ForMatDMY($row["NgaySinh"]);
                $row["ThoiGianKham"] = Common::ForMatDMYHIS($row["ThoiGianKham"]);
                $row["ThuocLoaiDon"] = $donthuoc->ThuocLoaiDon();
                $row["TongNgayDung"] = $row["TongNgayDung"].' '.'ngày';
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportBenhNhanTrongNgay.xlsx");
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
}

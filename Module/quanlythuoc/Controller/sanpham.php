<?php

namespace Module\quanlythuoc\Controller;

use Exception;
use Model\Common;
use Module\quanlythuoc\Model\PhieuXuatNhap;
use Module\quanlythuoc\Model\SanPham as ModelSanPham;
use Module\quanlythuoc\Model\SanPham\FormSanPham;
use Module\quanlythuoc\Permission;

class sanpham extends \Application implements \Controller\IControllerBE
{

    public function __construct()
    {
        /**
         * kiem tra đăng nhap
         * @param {type} parameter
         */
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    function export()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Export]);
        $sp = new \Module\quanlythuoc\Model\SanPham();
        $item = $sp->GetAllThuoc();
        // var_dump($item);
        // $data[] = ["BẢNG KÊ THUỐC PHÒNG KHÁM PHƯƠNG UYÊN"];
        $data[] = [
            "Mã thuốc", "Tên Thuốc", "Tên biệt dược", "Số lô", "Giá nhập", "Giá Bán", "Đơn vị tính", "Ngày sản xuất", "Hạn sử dụng", "Tác dụng", "Cơ chế tác dụng", "Ghi chú", "Số lượng", "Nhà sản xuất", "Nước sản xuất", "Cách dùng thuốc", "Số lượng cảnh báo"
        ];
        // $data[] = [];
        // $total = 0;
        // $convert = new Common();
        if ($item) {
            foreach ($item as $row) {
                $row["Giaban"] = Common::ViewPrice($row["Giaban"]);
                $row["Gianhap"] = Common::ViewPrice($row["Gianhap"]);
                $row["Ngaysx"] = Common::ForMatDMY($row["Ngaysx"]);
                $row["HSD"] = Common::ForMatDMY($row["HSD"]);
                $row["CachDung"] = $sp->GetDesByVal($row["CachDung"], 'cachdungthuoc');
                $row["DVT"] = $sp->GetDesByVal($row["DVT"], 'donvitinh');
                // $row["DVT"] = $sp->DonViTinh($row["DVT"]);
                // var_dump($row["DVT"]);
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/Excel/ExportThuoc.xlsx");
        }
    }

    function import()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Import]);
        try {
            if (isset($_POST["submit"])) {
                // Kiểm tra File đúng định dạng không khi import
                $allowed_extension = array('xls', 'csv', 'xlsx');
                $file_array = explode(".", $_FILES["import_file"]["name"]);
                $file_extension = end($file_array);
                if (in_array($file_extension, $allowed_extension) == false) {
                    throw new Exception("File không đúng định dạng");
                }
                $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($_FILES['import_file']['tmp_name']);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
                $spreadsheet = $reader->load($_FILES['import_file']['tmp_name']);
                $dataSheet0 = $spreadsheet->getSheet(0)->toArray();
                $sanpham = new ModelSanPham();
                foreach ($dataSheet0 as $index => $item) {
                    if ($index > 0) {
                        $item[8] = str_replace("/", "-", $item[8]);
                        $item[9] = str_replace("/", "-", $item[9]);
                        // echo $item[0];
                        // var_dump($index);
                        // them vào database  
                        $itemInsert["Id"] = $sanpham->CreatId();
                        $itemInsert["Idloaithuoc"] = $item[1];
                        $itemInsert["Name"] = Common::CheckName($item[2]);
                        $itemInsert["Namebietduoc"] = $item[3];
                        $itemInsert["Solo"] = intval($item[4]);
                        $itemInsert["Gianhap"] = $item[5];
                        $itemInsert["Giaban"] = $item[6];
                        $a = $sanpham->GetValByDesDVT($item[7]);
                        $b = $sanpham->GetValByDesCachDung($item[17]);
                        $itemInsert["DVT"] = $a["Val"] ?? "";
                        $itemInsert["Ngaysx"] = date("Y-m-d", strtotime($item[8]));
                        $itemInsert["HSD"] = date("Y-m-d", strtotime($item[9]));
                        $itemInsert["Tacdung"] = $item[10];
                        $itemInsert["Cochetacdung"] = $item[11];
                        $itemInsert["Ghichu"] = $item[12];
                        $itemInsert["NhaSX"] = $item[13];
                        $itemInsert["NuocSX"] = $item[14];
                        $itemInsert["Soluong"] = $item[15];
                        $itemInsert["DVQuyDoi"] = $item[16];
                        $itemInsert["CachDung"] = $b["Val"] ?? "";
                        $itemInsert["Canhbao"] = $item[18];
                        $sanpham->Post($itemInsert);
                        new \Model\Error(\Model\Error::success, "Import Thành Công");
                    }
                }
                Common::ToUrl("/index.php?module=quanlythuoc&controller=sanpham&action=index");
                // die();
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        $this->View();
    }

    function index()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_DS]);
        $modelItem = new ModelSanPham();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->GetItems($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function dongboSL()
    {
        $sp = new \Module\quanlythuoc\Model\SanPham();
        $sp->DongBoThuocNhap();
    }

    function detail()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Detail]);
        $id = \Model\Request::Get("id", null);
        if ($id == null) {
        }
        $SP = new ModelSanPham();
        $data["data"] = $SP->GetById($id);
        $this->View($data);
    }

    /**
     *
     * @return mixed
     */
    function post()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Post]);
        try {
            if (\Model\Request::Post(FormSanPham::$ElementsName, null)) {
                $sanpham = new ModelSanPham();
                $itemForm = \Model\Request::Post(FormSanPham::$ElementsName, null);
                $item["Id"] = $sanpham->CreatId();
                // $itemForm["Link"] = \Model\Common::BoDauTienViet($itemForm["Link"]);
                $item["Idloaithuoc"] = $itemForm["Idloaithuoc"];
                $item["Name"] = $itemForm["Name"];
                $item["Namebietduoc"] = $itemForm["Namebietduoc"];
                $item["Solo"] = $itemForm["Solo"];
                $item["Gianhap"] = $itemForm["Gianhap"];
                $item["Giaban"] = $itemForm["Giaban"];
                $item["DVQuyDoi"]  = $itemForm["DVQuyDoi"];
                $item["Ngaysx"] = $itemForm["Ngaysx"] ? $itemForm["Ngaysx"] : "";
                $item["DVT"] = $itemForm["DVT"];
                $item["HSD"] = $itemForm["HSD"] ? $itemForm["HSD"] : "";
                $item["Tacdung"] = $itemForm["Tacdung"];
                $item["Cochetacdung"] = $itemForm["Cochetacdung"];
                $item["Ghichu"] = $itemForm["Ghichu"];
                $item["Soluong"] = $itemForm["Soluong"];
                $item["NhaSX"] = $itemForm["NhaSX"];
                $item["NuocSX"] = $itemForm["NuocSX"];
                $item["CachDung"] = $itemForm["CachDung"];
                $item["Canhbao"] = $itemForm["Canhbao"];
                $item["IsDelete"] = 0;
                $sanpham->Post($item);

                $phieuXuatNhap = new \Module\quanlythuoc\Model\PhieuXuatNhap();
                $IdPhieu = PhieuXuatNhap::getIdPhieu();
                // echo $IdPhieu;
                $phieuDB =  $phieuXuatNhap->GetById($IdPhieu);
                if ($phieuDB != null) {
                    throw new Exception("Đã có mã phiếu này.");
                }
                $Phieu["IdPhieu"] = $IdPhieu;
                $Phieu["TongTien"] = $itemForm["Soluong"] * $itemForm["Gianhap"];
                $Phieu["DoViCungCap"] = $itemForm["DoViCungCap"] ?? "";
                $Phieu["XuatNhap"] = 1;
                $Phieu["NoiDungPhieu"] = "Nhập thuốc mới";
                $Phieu["GhiChu"] = "";
                $Phieu["NgayNhap"] = Date("Y-m-d H:i:s");
                $Phieu["CreateRecord"] = Date("Y-m-d H:i:s", time());
                $Phieu["UpdateRecord"] = Date("Y-m-d H:i:s", time());
                $Phieu["IsDelete"] = 0;
                // die();
                $phieuXuatNhap = new \Module\quanlythuoc\Model\PhieuXuatNhap();
                $phieuXuatNhap->Post($Phieu);

                $thuocDetail['IdPhieu'] = $IdPhieu;
                $thuocDetail['IdThuoc'] = $item["Id"];
                $thuocDetail['SoLuong'] = $item["Soluong"];
                $thuocDetail['SoLo'] = $item["Solo"];
                $thuocDetail['NhaSanXuat'] = $item["NhaSX"];
                $thuocDetail['NuocSanXuat'] = $item["NuocSX"];
                $thuocDetail['Price'] = $item["Gianhap"];
                $thuocDetail['HanSuDung'] = date("Y-m-d", strtotime($item["HSD"]));
                $thuocDetail['XuatNhap'] = 1;
                $thuocDetail['CreateRecord'] = Date("Y-m-d H:i:s", time());
                $thuocDetail['UpdateRecord'] = Date("Y-m-d H:i:s", time());
                $thuocDetail['GhiChu'] = "";
                $thuocDetail['IsDelete'] = 0;
                $detail = new \Module\quanlythuoc\Model\PhieuXuatNhapChiTiet();
                $detail->Post($thuocDetail);
                new \Model\Error(\Model\Error::success, "Thêm thuốc thành công");
                // \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=danhmuc&action=put&id=" . $itemForm["Code"]);
                Common::ToUrl("/index.php?module=quanlythuoc&controller=sanpham&action=index");
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $this->View();
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Put]);
        try {
            if (\Model\Request::Post(FormSanPham::$ElementsName, null)) {

                $itemHtml = \Model\Request::Post(FormSanPham::$ElementsName, null);

                $model["Id"] = $itemHtml["Id"]; // Phải Có
                $model["Idloaithuoc"] = $itemHtml["Idloaithuoc"];
                $model["Name"] = $itemHtml["Name"];
                $model["Namebietduoc"] = $itemHtml["Namebietduoc"];
                $model["Solo"] = $itemHtml["Solo"];
                $model["Gianhap"] = $itemHtml["Gianhap"];
                $model["Giaban"] = $itemHtml["Giaban"];
                $model["DVT"] = $itemHtml["DVT"];
                $model["Ngaysx"] = Date("Y-m-d", strtotime($itemHtml["Ngaysx"])) ?? "";
                $model["HSD"] = Date("Y-m-d", strtotime($itemHtml["HSD"])) ?? "";
                $model["Tacdung"] = $itemHtml["Tacdung"];
                $model["Cochetacdung"] = $itemHtml["Cochetacdung"];
                $model["Ghichu"] = $itemHtml["Ghichu"];
                $model["Soluong"] = $itemHtml["Soluong"];
                $model["NhaSX"] = $itemHtml["NhaSX"];
                $model["DVQuyDoi"] = $itemHtml["DVQuyDoi"];
                $model["NuocSX"] = $itemHtml["NuocSX"];
                $model["CachDung"] = $itemHtml["CachDung"];
                $model["Canhbao"] = $itemHtml["Canhbao"];
                $dm = new ModelSanPham();
                $dm->Put($model);
                new \Model\Error(\Model\Error::success, "Sửa thuốc thành công");
                // \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=sanpham&action=index");
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        $id = \Model\Request::Get("id", null);
        if ($id == null) {
        }
        $SP = new ModelSanPham();
        $data["items"] = $SP->GetById($id);
        $this->View($data);
    }

    /**
     *
     * @return mixed
     */
    function delete()
    {
        try {
            \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Delete]);
            $Id = \Model\Request::Get("id", null);
            if ($Id) {
                $SanPham = new ModelSanPham();
                $SanPham->Delete($Id);
                new \Model\Error(\Model\Error::success, "Xóa Thuốc Thành Công");
            }
        } catch (Exception $ex) {
            new \Model\Error(\Model\Error::danger, $ex->getMessage());
        }
        Common::ToUrl("/index.php?module=quanlythuoc&controller=sanpham&action=index");
    }

    public function isdelete()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Delete]);
        if (\Model\Request::Get("id", [])) {
            $DSMaSanPham = \Model\Request::Get("id", []);
            $modelItem = new ModelSanPham();
            $modelItem->isDelete([$DSMaSanPham]);
        }
        if (\Model\Request::Post("SanPham", [])) {
            $DSMaSanPham = \Model\Request::Post("SanPham", []);
            $DSMaSanPham = array_keys($DSMaSanPham);
            $modelItem = new ModelSanPham();
            $modelItem->isDelete($DSMaSanPham);
        }
        new \Model\Error(\Model\Error::success, "Xóa Thuốc Thành Công");
        \Model\Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }
}

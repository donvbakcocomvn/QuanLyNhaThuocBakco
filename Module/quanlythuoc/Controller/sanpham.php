<?php

namespace Module\quanlythuoc\Controller;

use Exception;
use Model\Common;
use Model\Error;
use Model\Notions;
use Module\quanlythuoc\Model\PhieuXuatNhap;
use Module\quanlythuoc\Model\SanPham as ModelSanPham;
use Module\quanlythuoc\Model\SanPham\FormSanPham;
use Module\quanlythuoc\Permission;
use Module\quanlythuoc\Model\DanhMuc;

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
        $item = $sp->GetThuoc();
        $data[] = [
            "Mã thuốc", "Danh mục thuốc", "Tên Thuốc", "Giá Bán", "Đơn vị tính", "Tác dụng", "Ghi chú", "Số lượng Ban Đầu", "Số lượng xuất", "Số lượng nhập", "Số lượng tồn kho", "Số lượng cảnh báo", "Cách dùng thuốc", "Ngày tạo thuốc"
        ];
        if ($item) {
            foreach ($item as $row) {
                $row["Giaban"] = Common::ViewPrice($row["Giaban"]);
                // $row["Gianhap"] = Common::ViewPrice($row["Gianhap"]);
                // $row["NuocSX"] = Notions::GetById($row["NuocSX"]) ?? "";
                $row["CachDung"] = $sp->GetDesByVal($row["CachDung"], 'cachdungthuoc');
                $row["Soluong"] = Common::ViewNumber($row["Soluong"]);
                $row["DVT"] = $sp->GetDesByVal($row["DVT"], 'donvitinh');
                $row["SLXuat"] = Common::ViewNumber($row["SLXuat"]);
                $row["SLNhap"] = Common::ViewNumber($row["SLNhap"]);
                $row["SLHienTai"] = Common::ViewNumber($row["SLHienTai"]);
                $row["CreateRecord"] = Common::ForMatDMYHIS($row["CreateRecord"]);
                $row["Idloaithuoc"] = DanhMuc::GetNameById($row["Idloaithuoc"]) ?? "";
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
                    // var_dump($item[1]);
                    if ($index > 0) {
                        $item[7] = str_replace("/", "-", $item[7]);
                        $item[8] = str_replace("/", "-", $item[8]);
                        // them vào database  
                        $nameDM = DanhMuc::GetIdByName($item[2]);
                        $itemInsert["Id"] = $sanpham->CreatId();
                        if ($item[1] != "") {
                            $itemInsert["Name"] = Common::CheckName($item[1]);
                            $itemInsert["Idloaithuoc"] = $nameDM ?? '';
                            $itemInsert["Solo"] = $item[3] ? intval($item[3]) : '';
                            $itemInsert["Gianhap"] = $item[4] ? $item[4] : '';
                            $itemInsert["Giaban"] = $item[5] ? $item[5] : '';
                            $a = $sanpham->GetValByDes($item[6],'donvitinh');
                            $b = $sanpham->GetValByDes($item[16],'cachdungthuoc');
                            $itemInsert["DVT"] = $a["Val"] ?? "";
                            $itemInsert["Ngaysx"] = date("Y-m-d", strtotime($item[7])) ?? "";
                            $itemInsert["HSD"] = date("Y-m-d", strtotime($item[8])) ?? "";
                            $itemInsert["Tacdung"] = $item[9] ?? "";
                            $itemInsert["Cochetacdung"] = $item[10] ?? "";
                            $itemInsert["Ghichu"] = $item[11] ?? "";
                            $itemInsert["NhaSX"] = $item[12] ?? "";
                            $itemInsert["NuocSX"] = $item[13] ?? "";
                            $itemInsert["Soluong"] = $item[14] ?? "";
                            $c = $sanpham->GetValByDes($item[15], 'donviquydoi');
                            $itemInsert["DVQuyDoi"] = $c["Val"] ?? "";
                            $itemInsert["CachDung"] = $b["Val"] ?? "";
                            $itemInsert["Canhbao"] = $item[17];
                            $itemInsert["SLXuat"] = 0;
                            $itemInsert["SLNhap"] = 0;
                            $itemInsert["SLHienTai"] = 0;
                            $sanpham->Post($itemInsert);
                            $sanpham->DongBoThuocNhapByID($itemInsert["Id"]);
                        }
                    }
                }
                new \Model\Error(\Model\Error::success, "Import Thành Công");
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
        $sp->DongBoThuocNhapByID();
        new Error(Error::success, "Đã đồng bộ xong phiếu xuất nhập.");
        Common::ToUrl("/quanlythuoc/sanpham/index/");
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
                $item["Idloaithuoc"] = $itemForm["Idloaithuoc"];
                $item["Name"] = $itemForm["Name"];
                $item["Namebietduoc"] = $itemForm["Name"];
                $item["Solo"] = $itemForm["Solo"];
                $item["Gianhap"] = $itemForm["Gianhap"];
                $item["Giaban"] = $itemForm["Giaban"];
                $item["DVQuyDoi"]  = $itemForm["DVQuyDoi"];
                $item["Ngaysx"] = Common::StrToDateDB($itemForm["Ngaysx"]);
                $item["DVT"] = $itemForm["DVT"];
                $item["HSD"] = Common::StrToDateDB($itemForm["HSD"]);
                $item["Tacdung"] = $itemForm["Tacdung"];
                $item["Cochetacdung"] = $itemForm["Cochetacdung"];
                $item["Ghichu"] = $itemForm["Ghichu"];
                $item["Soluong"] = intval($itemForm["Soluong"]);
                $item["NhaSX"] = $itemForm["NhaSX"];
                $item["NuocSX"] = $itemForm["NuocSX"];
                $item["CachDung"] = $itemForm["CachDung"];
                $item["Canhbao"] = $itemForm["Canhbao"];
                $item["IsDelete"] = 0;
                $sanpham->Post($item);
                $sanpham->DongBoThuocNhapByID($item["Id"]);
                new \Model\Error(\Model\Error::success, "Thêm thuốc thành công");
                Common::ToUrl("/index.php?module=quanlythuoc&controller=sanpham&action=index");
                // \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=danhmuc&action=put&id=" . $itemForm["Code"]);
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
                $model["Namebietduoc"] = $itemHtml["Name"];
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
                $dm = new ModelSanPham($model["Id"]);
                $dm->Put($model);
                $dm->DongBoThuocNhapByID();
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
                Common::ToUrl("/index.php?module=quanlythuoc&controller=sanpham&action=index");
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
            // new \Model\Error(\Model\Error::danger, $ex->getMessage());
        }
    }

    public function isdelete()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Delete]);
        try {
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
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}

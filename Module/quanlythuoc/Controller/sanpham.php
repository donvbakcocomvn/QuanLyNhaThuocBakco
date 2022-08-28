<?php

namespace Module\quanlythuoc\Controller;

use DateTime;
use Exception;
use Model\Common;
use Model\OptionsService;
use Module\baiviet\Model\Options\Options;
use Module\quanlythuoc\Model\SanPham as ModelSanPham;
use Module\quanlythuoc\Model\SanPham\FormSanPham;
use Module\quanlythuoc\Permission;
use PFBC\Element\Date;

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

    function import()
    {
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
                    if ($item[0] != "" and $index > 0) {
                        $item[8] = str_replace("/","-",$item[8]);
                        $item[9] = str_replace("/","-",$item[9]);
                        echo $item[15];
                        // var_dump($index);
                        // them vào database  
                        $itemInsert["Id"] = $item[0];
                        $itemInsert["Idloaithuoc"] = $item[1];
                        $itemInsert["Name"] = Common::CheckName($item[2]) ;
                        $itemInsert["Namebietduoc"] = $item[3];
                        $itemInsert["Solo"] = intval($item[4]);
                        $itemInsert["Gianhap"] = $item[5] ;
                        $itemInsert["Giaban"] = $item[6];
                        $itemInsert["DVT"] = $item[7];
                        $itemInsert["Ngaysx"] = date("Y-m-d", strtotime($item[8]));
                        $itemInsert["HSD"] = date("Y-m-d", strtotime($item[9]));
                        $itemInsert["Tacdung"] = $item[10];
                        $itemInsert["Cochetacdung"] = $item[11];
                        $itemInsert["Ghichu"] = $item[12];
                        $itemInsert["NhaSX"] = $item[13];
                        $itemInsert["NuocSX"] = $item[14];
                        $itemInsert["Soluong"] = $item[15];
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

        \Model\Permission::Check([\Model\User::Admin, Permission::QLT_Thuoc_DS]);
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

    /**
     *
     * @return mixed
     */
    function post()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Post]);
        try {
            if (\Model\Request::Post(FormSanPham::$ElementsName, null)) {
                $op = new OptionsService();
                $nameDVT = $op->GetGroupsToSelect("donvitinh");

                $itemForm = \Model\Request::Post(FormSanPham::$ElementsName, null);
                $itemForm["Id"] = $itemForm["Id"];
                // $itemForm["Link"] = \Model\Common::BoDauTienViet($itemForm["Link"]);
                $itemForm["Idloaithuoc"] = $itemForm["Idloaithuoc"];
                $itemForm["Name"] = $itemForm["Name"];
                $itemForm["Namebietduoc"] = $itemForm["Namebietduoc"];
                $itemForm["Solo"] = $itemForm["Solo"];
                $itemForm["Gianhap"] = $itemForm["Gianhap"];
                $itemForm["Giaban"] = $itemForm["Giaban"];
                $itemForm["DVT"] = $itemForm["DVT"];
                $itemForm["DVT"]  = $nameDVT[$itemForm["DVT"]];
                $itemForm["Ngaysx"] = $itemForm["Ngaysx"];
                $itemForm["HSD"] = $itemForm["HSD"];
                $itemForm["Tacdung"] = $itemForm["Tacdung"];
                $itemForm["Cochetacdung"] = $itemForm["Cochetacdung"];
                $itemForm["Ghichu"] = $itemForm["Ghichu"];
                $itemForm["Soluong"] = $itemForm["Soluong"];
                $itemForm["NhaSX"] = $itemForm["NhaSX"];
                $itemForm["NuocSX"] = $itemForm["NuocSX"];
                $danhmuc = new ModelSanPham();
                $danhmuc->Post($itemForm);
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
                $op = new OptionsService();
                $nameDVT = $op->GetGroupsToSelect("donvitinh");

                $itemHtml = \Model\Request::Post(FormSanPham::$ElementsName, null);

                $model["Id"] = $itemHtml["Id"]; // Phải Có
                $model["Idloaithuoc"] = $itemHtml["Idloaithuoc"];
                $model["Name"] = $itemHtml["Name"];
                $model["Namebietduoc"] = $itemHtml["Namebietduoc"];
                $model["Solo"] = $itemHtml["Solo"];
                $model["Gianhap"] = $itemHtml["Gianhap"];
                $model["Giaban"] = $itemHtml["Giaban"];
                $model["DVT"] = $nameDVT[$itemHtml["DVT"]];
                $model["Ngaysx"] = Date("Y-m-d", strtotime($itemHtml["Ngaysx"]));
                $model["HSD"] = Date("Y-m-d", strtotime($itemHtml["HSD"]));
                $model["Tacdung"] = $itemHtml["Tacdung"];
                $model["Cochetacdung"] = $itemHtml["Cochetacdung"];
                $model["Ghichu"] = $itemHtml["Ghichu"];
                $model["Soluong"] = $itemHtml["Soluong"];
                $model["NhaSX"] = $itemHtml["NhaSX"];
                $model["NuocSX"] = $itemHtml["NuocSX"];
                $dm = new ModelSanPham();
                $dm->Put($model);
                new \Model\Error(\Model\Error::success, "Đã Sửa Danh Mục");
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
                new \Model\Error(\Model\Error::success, "Đã Xóa Danh Mục");
            }
        } catch (Exception $ex) {
            new \Model\Error(\Model\Error::danger, $ex->getMessage());
        }
        Common::ToUrl("/index.php?module=quanlythuoc&controller=sanpham&action=index");
    }

    function GetByName()
    {
    }

    function GetByNameBietDuoc()
    {
    }
}

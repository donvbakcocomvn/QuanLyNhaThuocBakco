<?php

namespace Module\quanlythuoc\Controller;

use DateTime;
use Module\quanlythuoc\Model\SanPham as ModelSanPham;
use Module\quanlythuoc\Model\SanPham\FormSanPham;
use Module\quanlythuoc\Permission;
use PFBC\Element\Date;
use PHPMailer\PHPMailer\Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;


class sanpham extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        /**
         * kiem tra đăng nhap
         * @param {type} parameter
         */
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    function import(){
    if (isset($_FILES["FileData"])) {
        try {
            if ($_FILES["FileData"]["error"] != 0) {
                throw new Exception("Bạn chưa chọn file.");
            }
            if ($_FILES["FileData"]["type"] != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                throw new Exception("File không đúng định dạng.");
            }
            // da có file excel
            // da có file
            // var_dump($_FILES);
            ini_set('memory_limit', '1024M');
            $fileData = $_FILES["FileData"]["tmp_name"];
            $reader = IOFactory::createReaderForFile($fileData);
            $reader->setReadDataOnly(true);
            $dataSheet = $reader->load($fileData);
            $dataSheet0 = $dataSheet->getSheet(0)->toArray();
            $danhMuc = new ModelSanPham();
            foreach ($dataSheet0 as $index => $item) {
                if ($index > 0) {
                    // them vào database  
                    $itemInsert["Id"] = $item[0];
                    $itemInsert["Name"] = $item[1];
                    $itemInsert["Decription"] = $item[2];
                    $itemInsert["IsDelete"] = $item[3];
                    // DB::$debug = true;
                    $danhMuc->Post($itemInsert);
                }
            }
        } catch (Exception $ex) {
        }
    }

    $this->View();
}

    function index() {

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
	function post() {
        \Model\Permission::Check([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_Thuoc_Post]);
        try {
            if (\Model\Request::Post(FormSanPham::$ElementsName, null)) {
                $itemForm = \Model\Request::Post(FormSanPham::$ElementsName, null);
                $itemForm["Id"] = \Model\Common::uuid();
                // $itemForm["Link"] = \Model\Common::BoDauTienViet($itemForm["Link"]);
                $itemForm["Idloaithuoc"] = $itemForm["Idloaithuoc"];
                $itemForm["Name"] = $itemForm["Name"];
                $itemForm["Namebietduoc"] = $itemForm["Namebietduoc"];
                $itemForm["Solo"] = $itemForm["Solo"];
                $itemForm["Gianhap"] = $itemForm["Gianhap"];
                $itemForm["Giaban"] = $itemForm["Giaban"];
                $itemForm["DVT"] = $itemForm["DVT"];
                $itemForm["Ngaysx"] = $itemForm["Ngaysx"];
                $itemForm["HSD"] = $itemForm["HSD"];
                $itemForm["Tacdung"] = $itemForm["Tacdung"];
                $itemForm["Cochetacdung"] = $itemForm["Cochetacdung"];
                $itemForm["Ghichu"] = $itemForm["Ghichu"];
                $itemForm["NhaSX"] = $itemForm["NhaSX"];
                $itemForm["NuocSX"] = $itemForm["NuocSX"];
                $danhmuc = new ModelSanPham();
                $danhmuc->Post($itemForm);
                // \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=danhmuc&action=put&id=" . $itemForm["Code"]);
                \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=sanpham&action=index");

            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
        $this->View();
	}
	
	/**
	 *
	 * @return mixed
	 */
	function put() {
        \Model\Permission::Check([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_Thuoc_Put]);
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
                $model["Ngaysx"] = Date("Y-m-d H:i:s", strtotime($itemHtml["Ngaysx"]));

                $model["HSD"] = Date("Y-m-d H:i:s", strtotime($itemHtml["HSD"]));
                $model["Tacdung"] = $itemHtml["Tacdung"];
                $model["Cochetacdung"] = $itemHtml["Cochetacdung"];
                $model["Ghichu"] = $itemHtml["Ghichu"];
                $model["NhaSX"] = $itemHtml["NhaSX"];
                $model["NuocSX"] = $itemHtml["NuocSX"];
                $dm = new ModelSanPham();
                $dm->Put($model);
                new \Model\Error(\Model\Error::success, "Đã Sửa Danh Mục");
                // \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=sanpham&action=index");
            }
        } catch (\Exception $exc) {
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
	function delete() {
        try {
            \Model\Permission::Check([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_Thuoc_Delete]);
            $Id = \Model\Request::Get("id", null);
            if ($Id) {
                $SanPham = new ModelSanPham();
                $SanPham->Delete($Id);
                new \Model\Error(\Model\Error::success, "Đã Xóa Danh Mục");
            }
        } catch (\Exception $ex) {
            new \Model\Error(\Model\Error::danger, $ex->getMessage());
        }
        \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=sanpham&action=index");
	}

    function GetByName() {
	}

    function GetByNameBietDuoc() {
	}
}

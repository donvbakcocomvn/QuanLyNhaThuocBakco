<?php

namespace Module\quanlysanpham\Controller;

use Module\quanlysanpham\Model\DanhMuc\FormDanhMuc;

class danhmuc extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        /**
         * kiem tra đăng nhap
         * @param {type} parameter
         */
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    function index() {

        \Model\Permission::Check([\Model\User::Admin, "quanlysanpham_danhmuc_view"]);
        $modelItem = new \Module\quanlysanpham\Model\DanhMuc();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
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

    public function delete() {
        try {
            \Model\Permission::Check([\Model\User::Admin, "quanlysanpham_danhmuc_delete"]);
            $id = \Model\Request::Get("id", null);
            if ($id) {
                $DanhMuc = new \Module\quanlysanpham\Model\DanhMuc();
                $DanhMuc->Delete($id); 
                new \Model\Error(\Model\Error::success, "Đã Xóa Danh Mục");
            }
        } catch (\Exception $ex) {
            new \Model\Error(\Model\Error::danger, $ex->getMessage());
        }
        \Model\Common::ToUrl("/index.php?module=quanlysanpham&controller=danhmuc");
    }

    public function post() {
        \Model\Permission::Check([\Model\User::Admin, "quanlysanpham_danhmuc_post"]);

        try {
            if (\Model\Request::Post(FormDanhMuc::$ElementsName, null)) {
                /**
                 * cái này nhận từ form
                 * @param {type} parameter
                 */
                $itemHtml = \Model\Request::Post(FormDanhMuc::$ElementsName, null);

                $model["Id"] = \Model\Common::uuid();
                $model["Name"] = $itemHtml["Name"];
                $model["keyword"] = $itemHtml["keyword"];
                $model["des"] = $itemHtml["des"];
                $model["title"] = $itemHtml["title"];
                $dm = new \Module\quanlysanpham\Model\DanhMuc();
                $dm->Post($model);
                new \Model\Error(\Model\Error::success, "Đã Tạo Danh Mục");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
        $this->View();
    }

    public function put() {
        \Model\Permission::Check([\Model\User::Admin, "quanlysanpham_danhmuc_put"]);


        try {
            if (\Model\Request::Post(FormDanhMuc::$ElementsName, null)) {

                $itemHtml = \Model\Request::Post(FormDanhMuc::$ElementsName, null);

                $model["Id"] = $itemHtml["Id"];
                $model["Name"] = $itemHtml["Name"];
                $model["keyword"] = strip_tags($itemHtml["keyword"]);
                $model["Lang"] = $itemHtml["Lang"];
                $model["des"] = strip_tags($itemHtml["des"]);
                $model["title"] = strip_tags($itemHtml["title"]);
                $dm = new \Module\quanlysanpham\Model\DanhMuc();
                $dm->Put($model);
                new \Model\Error(\Model\Error::success, "Đã Sửa Danh Mục");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }

        $id = \Model\Request::Get("id", null);
        if ($id == null) {
            
        }
        $DM = new \Module\quanlysanpham\Model\DanhMuc();
        $data["item"] = $DM->GetById($id);
        $this->View($data);
    }

}

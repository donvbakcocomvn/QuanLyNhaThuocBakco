<?php

namespace Module\quanlysanpham\Controller;

use Module\quanlysanpham\Model\SanPham\FormSanPham;

class sanpham extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        /**
         * kiem tra đăng nhap
         * @param {type} parameter
         */
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    function index() {

        \Model\Permission::Check([\Model\User::Admin, "quanlysanpham_sanpham_view"]);
        $modelItem = new \Module\quanlysanpham\Model\SanPham();
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

    function trash() {

        \Model\Permission::Check([\Model\User::Admin, "quanlysanpham_sanpham_view"]);
        $modelItem = new \Module\quanlysanpham\Model\SanPham();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = -1;
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

    function deleteall() {
        if (\Model\Request::Post("SanPham", [])) {
            $ids = \Model\Request::Post("SanPham", []);

            foreach ($ids as $id => $onOf) {
                $sanPham = new \Module\quanlysanpham\Model\SanPham();
                $sanPham->Delete($id);
            } 
            \Model\Common::ToUrl($_SERVER["HTTP_REFERER"]);
        }
        $id = $this->getParams(0);
//        var_dump($id);
        try {
            $sanPham = new \Module\quanlysanpham\Model\SanPham();
            $sanPham->Delete($id);
        } catch (\Exception $ex) {
            
        }
        \Model\Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }

    public function delete() {

        if (\Model\Request::Get("id", [])) {
            $DSMaSanPham = \Model\Request::Get("id", []);
            $modelItem = new \Module\quanlysanpham\Model\SanPham();
            $modelItem->DeleteIsShow([$DSMaSanPham]);
        }
        if (\Model\Request::Post("SanPham", [])) {
            $DSMaSanPham = \Model\Request::Post("SanPham", []);
            $DSMaSanPham = array_keys($DSMaSanPham);
            $modelItem = new \Module\quanlysanpham\Model\SanPham();
            $modelItem->DeleteIsShow($DSMaSanPham);
        }
        \Model\Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }

    public function post() {
        \Model\Permission::Check([\Model\User::Admin, "quanlysanpham_sanpham_post"]);
        try {
            if (\Model\Request::Post(FormSanPham::$ElementsName, null)) {
                $itemForm = \Model\Request::Post(FormSanPham::$ElementsName, null);
                $itemForm["Id"] = \Model\Common::uuid();
                $itemForm["Alias"] = \Model\Common::BoDauTienViet($itemForm["Name"]);
                $itemForm["Username"] = \Model\User::CurentUser()->Username;
                $SanPham = new \Module\quanlysanpham\Model\SanPham();
                $SanPham->Post($itemForm);
                \Model\Common::ToUrl("/index.php?module=quanlysanpham&controller=sanpham&action=put&id=" . $itemForm["Id"]);
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }


        $this->View();
    }

    public function put() {
        \Model\Permission::Check([\Model\User::Admin, "quanlysanpham_sanpham_put"]);
        $SanPham = new \Module\quanlysanpham\Model\SanPham();
        if (\Model\Request::Post(FormSanPham::$ElementsName, null)) {
            $itemHtml = \Model\Request::Post(FormSanPham::$ElementsName, null);

            $id = $itemHtml["Id"];
            $item = $SanPham->GetById($id);
            $item['Name'] = \Model\Common::TextInput($itemHtml["Name"]);
            if (\Model\Request::Post("KhoaAlias", null) == null) {
                $item['Alias'] = \Model\Common::BoDauTienViet($itemHtml["Name"]);
            }
            $item['Content'] = \Model\Common::TextInput($itemHtml["Content"]);
            $itemHtml["Price"] = str_replace(",", "", $itemHtml["Price"]);
            $item['Price'] = intval($itemHtml["Price"]);
            $itemHtml["oldPrice"] = str_replace(",", "", $itemHtml["oldPrice"]);

            $item['oldPrice'] = intval($itemHtml["oldPrice"]);
            $itemHtml["Number"] = str_replace(",", "", $itemHtml["Number"]);
            $item['Number'] = intval($itemHtml["Number"]);
            $item['isShow'] = intval($itemHtml["isShow"]);
            $item['STT'] = intval($itemHtml["STT"]);
            $item['STT'] = min($item['STT'], time());
            $item['Lang'] = $itemHtml["Lang"];
            $item['Views'] = $itemHtml["Views"];
            $item['BuyTimes'] = $itemHtml["BuyTimes"];
            $item['DanhMucId'] = \Model\Common::TextInput($itemHtml["DanhMucId"]);
            $item['Summary'] = \Model\Common::TextInput($itemHtml["Summary"]);
            $item['Des'] = strip_tags(\Model\Common::TextInput($itemHtml["Des"]));
            $item['Keyword'] = strip_tags(\Model\Common::TextInput($itemHtml["Keyword"]));
            $item['UrlImages'] = strip_tags(\Model\Common::TextInput($itemHtml["UrlImages"]));
            $item['Title'] = strip_tags(\Model\Common::TextInput($itemHtml["Title"]));
            $SanPham->Put($item);
        }


        $id = \Model\Request::Get("id", null);
        $item = $SanPham->GetById($id);

        $this->View(["item" => $item]);
    }

}

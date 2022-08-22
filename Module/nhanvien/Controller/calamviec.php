<?php

namespace Module\nhanvien\Controller;

use Module\nhanvien\Model\Form\FormCaLamViec;

class calamviec extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    public function index() {
        \Model\Permission::Check([\Model\User::Admin, "NhanVienView"]);
        $modelUsers = new \Module\nhanvien\Model\CaLamViec();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $indexPage = isset($_REQUEST["indexPage"]) ? intval($_REQUEST["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelUsers->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    public function delete() {

    }

    public function post() {
        $this->View();
    }

    public function put() {
        $this->View(["Item" => $this->getParams(0)]);
    }

}

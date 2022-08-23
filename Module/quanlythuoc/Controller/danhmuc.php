<?php

namespace Module\quanlythuoc\Controller;

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

	/**
	 *
	 * @return mixed
	 */
	function post() {
        $this->View();
	}
	
	/**
	 *
	 * @return mixed
	 */
	function put() {
        $this->View();
	}
	
	/**
	 *
	 * @return mixed
	 */
	function delete() {
	}
}
